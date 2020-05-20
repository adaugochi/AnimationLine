<?php

namespace App\Http\Controllers;

use App\Billing;
use App\Contants\Message;
use App\helpers\Utils;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
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

        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function createPayment(Request $request)
    {
        $this->validate(request(), [
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'sales_amount' => 'required',
            'discount_price' => 'required',
            'amount' => 'required',
            'email' => 'required',
            'currency' => 'required',
            'package' => 'required',
            'payment_method' => 'required',
            'service' => 'required'
        ]);

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
        } catch (Exception $ex) {
            return redirect('/home')->with(['error' => Message::PAYMENT_CREATION]);
        }

        return redirect($payment->getApprovalLink());
    }

    /**
     * @param Billing $billing
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function executePayment(Billing $billing)
    {
        if (!session()->has('billing')) {
            return redirect('/home')->with(['error' => Message::BILLING_NOT_FOUND]);
        }
        DB::beginTransaction();
        $postRequest = session()->get('billing');
        $paymentId = request('paymentId');
        $payerId = request('PayerID');

        $billing->create($postRequest, $paymentId, $payerId);
        if (!$billing->save()) {
            DB::rollBack();
            return redirect('/home')->with(['error' => Message::BILLING_NOT_SAVE]);
        }
        $totalAmount = Session::get('billing.amount');
        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        $transaction = new Transaction();
        $amount = new Amount();

        $amount->setCurrency($postRequest['currency']);
        $amount->setTotal($totalAmount);
        $transaction->setAmount($amount);
        $execution->addTransaction($transaction);
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() == 'approved') {
            $slug = Utils::slug($postRequest['service']);
            session()->forget('billing');
            DB::commit();
            return redirect('/brief/'.$slug.'/'.$postRequest['package'].'/'.$billing->id)
                ->with(['success' => Message::PAYMENT_SUCCESSFUL]);
        }

        return redirect('/home')->with(['error' => Message::PAYMENT_UNSUCCESSFUL]);
    }

    /**
     * Redirect the User to Paystack Payment Page
     * @param Request $request
     * @return mixed
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function redirectToGateway(Request $request)
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     * @param Billing $billing
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleGatewayCallback(Billing $billing)
    {
        $paymentDetails = Paystack::getPaymentData();
        $postRequest = $paymentDetails['data']['metadata'];
        $paymentId = Paystack::genTranxRef();
        $payerId = Utils::GenerateToken();
        $slug = Utils::slug($postRequest['service']);

        if ($paymentDetails['data']['status'] == 'success') {
            $billing->create($postRequest, $paymentId, $payerId);
            if (!$billing->save()) {
                return redirect('/home')->with(['error' => Message::BILLING_NOT_SAVE]);
            }
            return redirect('/brief/'.$slug.'/'.$postRequest['package'].'/'.$billing->id)
                ->with(['success' => Message::PAYMENT_SUCCESSFUL]);
        }

        return redirect('/home')->with(['error' => Message::PAYMENT_UNSUCCESSFUL]);
    }
}
