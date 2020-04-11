<?php

namespace App\Http\Controllers;

use App\Billing;
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

class PaymentController extends Controller
{
    protected $apiContext;

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

    public function createPayment(Request $request)
    {
        $this->validate(request(), [
            'city' => 'required|alpha',
            'state' => 'required|alpha',
            'country' => 'required|alpha',
            'sales_amount' => 'required',
            'discount_price' => 'required',
            'total_amount' => 'required',
            'package' => 'required|alpha',
            'postal_code' => 'digits:6'
        ]);

        session()->put('billing', $request->all());

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal(request('total_amount'));

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
            return redirect('/home')->with(['error' => 'Some error occurred, could not approove payment']);
        }

        return redirect($payment->getApprovalLink());
    }

    public function executePayment(Billing $billing)
    {
        if (!session()->has('billing')) {
            return redirect('/home')->with(['error' => 'Could not find billing details']);
        }
        DB::beginTransaction();

        $postRequest = session()->get('billing');
        $paymentId = request('paymentId');
        $payerId = request('PayerID');
        $token = request('token');

        $billing->create($postRequest, $paymentId, $payerId, $token);
        if (!$billing->save()) {
            DB::rollBack();
        }
        $totalAmount = Session::get('billing.total_amount');

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        $transaction = new Transaction();
        $amount = new Amount();

        $amount->setCurrency('USD');
        $amount->setTotal($totalAmount);
        $transaction->setAmount($amount);

        $execution->addTransaction($transaction);
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() == 'approved') {
            DB::table('billings')->where('payment_id', $paymentId)->update(['payment_status' => 'paid']);
            session()->forget('billing');
            DB::commit();
            return redirect('/brief/'.$billing->id)->with(['success' => 'Payment was successful']);
        }

        return redirect('/')->with(['error' => 'Payment was unsuccessful']);
    }
}
