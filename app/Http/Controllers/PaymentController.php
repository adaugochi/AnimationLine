<?php

namespace App\Http\Controllers;

use App\Billing;
use App\Contants\Message;
use App\helpers\Utils;
use App\Mail\SendPaymentMail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Paystack;

class PaymentController extends Controller
{
    protected $apiContext;

    /**
     * PaymentController constructor.
     */
    public function __construct()
    {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                config('services.paypal.id'), // client id
                config('services.paypal.secret') // secret key
            )
        );
        $this->apiContext->setConfig(['mode' => config('services.paypal.mode')]); // mode
        $this->middleware(['auth','verified']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function createPayment(Request $request)
    {
        $validateData = $this->validate(request(), [
            'payment_method' => 'required',
            'billing_id' => 'required',
            'reference' => 'required'
        ]);

        $billing = Billing::find($request->billing_id);
        $billing = $billing->update($validateData);
        if (!$billing) {
            return redirect(route('home'))
                ->with('error', 'could not update billing detail. Please try again');
        }

        session()->put('billing', $request->all());

        $payer = new Payer();
        $payer->setPaymentMethod(request('payment_method'));

        $amount = new Amount();
        $amount->setCurrency(request('currency'))
            ->setTotal(request('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setDescription('Payment description')
            ->setInvoiceNumber(uniqid());

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(config('services.paypal.url.execute'))
            ->setCancelUrl(config('services.paypal.url.cancel'));

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions([$transaction]);

        try {
            $payment->create($this->apiContext);
            return redirect($payment->getApprovalLink());
        } catch (Exception $ex) {
            return redirect('/home')->with(['error' => Message::PAYMENT_CREATION]);
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function executePayment()
    {
        if (!session()->has('billing')) {
            return redirect('/home')->with(['error' => Message::BILLING_NOT_FOUND]);
        }

        $postRequest = session()->get('billing');
        $billing = Billing::find($postRequest['billing_id']);
        $user = $billing->user;
        $slug = Utils::slug($billing->service);

        $payment = Payment::get(request('paymentId'), $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId(request('PayerID'));
        $transaction = new Transaction();
        $amount = new Amount();
        $amount->setCurrency($postRequest['currency']);
        $amount->setTotal($postRequest['amount']);
        $transaction->setAmount($amount);
        $execution->addTransaction($transaction);
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() === 'approved') {
            $billing->status = Billing::DRAFT;
            $billing->save();
            Mail::to($user->email)->send(new SendPaymentMail(['name' => $user->getFullName()]));
            session()->forget('billing');
            return redirect('/brief/'.$slug.'/'.$billing->package.'/'.$billing->id)
                ->with(['success' => Message::PAYMENT_SUCCESSFUL]);
        }
        return redirect('/home')->with(['error' => Message::PAYMENT_UNSUCCESSFUL]);
    }

    /**
     * Redirect the User to Paystack Payment Page
     * @param Request $request
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function redirectToGateway(Request $request)
    {
        $validateData = $this->validate(request(), [
            'payment_method' => 'required',
            'billing_id' => 'required',
            'reference' => 'required'
        ]);

        $billing = Billing::find($request->billing_id);
        $billing = $billing->update($validateData);
        if (!$billing) {
            return redirect(route('home'))
                ->with('error', 'could not update billing detail. Please try again');
        }
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        $data = $paymentDetails['data'];
        $postRequest = $data['metadata'];
        $status = $data['status'];
        $txRef = $data['reference'];
        $billingId = $postRequest['billing_id'];
        $billing = Billing::find($billingId);
        $user = $billing->user;
        $slug = Utils::slug($postRequest['service']);

        if ($status === 'success' && $txRef === $billing->reference) {
            $billing->status = Billing::DRAFT;
            $billing->save();
            Mail::to($user->email)->send(new SendPaymentMail(['name' => $user->getFullName()]));
            return redirect('/brief/'.$slug.'/'.$postRequest['package'].'/'.$billingId)
                ->with(['success' => Message::PAYMENT_SUCCESSFUL]);
        } elseif ($txRef !== $billing->reference) {
            return redirect('/home')->with(['error' => 'Incorrect transaction reference token']);
        }
        return redirect('/home')->with(['error' => Message::PAYMENT_UNSUCCESSFUL]);
    }
}
