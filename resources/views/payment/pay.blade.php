
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('elements.head-tag')
<body class="ht-100v">
<main class="container">
    <div class="row">
        <div class="col-md-10 col-lg-8 mx-auto">
            <div class="py-5">
                <div>
                    <div class="text-center mb-3">
                        <a class="text-decoration-none" href="/">
                            <img src="{{ asset('img/logo.svg') }}" height="30">
                        </a>
                    </div>
                    <div class="card auth_wrapper">
                        <form class="card-form__wrapper validateForm" id="validateForm"
                              method="post" action="/create-payment">
                            <input type="hidden" name="amount" value="{{ $billing->amount }}" id="totalAmt">
                            <input type="hidden" value="{{ $billing->service }}" id="service">
                            <input type="hidden" value="{{ $billing->package }}" id="package">
                            <input type="hidden" name="currency" value="{{ $billing->currency }}" id="currency">
                            <input type="hidden" name="billing_id" value="{{ $billing->id }}" id="billingId">
                            <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                            <input type="hidden" name="reference" value="{{ \App\helpers\Utils::generateToken() }}" id="txRef">
                            <input type="hidden" name="metadata" id="metadata">
                            @csrf
                            <div class="basic-payment__wrapper mb-4">
                                <div class="fs-28 mb-3 font-weight-lighter text-brand-primary">
                                    Payment Details
                                </div>

                                <div class="form-group" id="paymentWrap">
                                    <label class="card-form__label">
                                        Select A Payment Method<span class="text-danger">*</span>
                                    </label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="paypal" name="payment_method"
                                               class="custom-control-input" value="paypal">
                                        <label class="custom-control-label" for="paypal">
                                            <img src="{{ asset('img/pay.webp') }}" class="payment-logo"/>
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline mt-4 mt-lg-0">
                                        <input type="radio" id="paystack" name="payment_method"
                                               class="custom-control-input" value="paystack">
                                        <label class="custom-control-label" for="paystack">
                                            <img src="{{ asset('img/paystack-logo.png') }}" class="payment-logo"/>
                                        </label>
                                    </div>
                                </div>
                                <p>
                                    By clicking on the button below, <b>you will be transferred to PayPal/Paystack</b>
                                    to confirm your payment. Then, you will be redirected back to finalize your order.
                                </p>
                                <div class="basic-payment__card-box">
                                    <h4>{{ ucfirst($billing->package) }} Package</h4>
                                    <hr class="line">
                                    <div class="d-flex justify-content-between">
                                        <p>Sales Amount</p>
                                        <p>
                                            <span class="currency">USD</span>
                                            <span class="sale-amount">{{ $billing->amount }}</span>
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p>Discount</p>
                                        <p>
                                            <span class="currency">USD</span>
                                            <span class="discount">0.00</span>
                                        </p>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <h4 class="font-weight-bold">Total Amount</h4>
                                        <h4 class="font-weight-bold">
                                            <span class="currency">USD</span>
                                            <span class="total-amount">{{ $billing->amount }}</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-brand-primary px-5 py-12 text-uppercase btn-submit">
                                pay now
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="{{ asset('js/app.js') }}"></script>
@include('elements.flash-messages')
</body>
</html>

@section('title', 'Payment Details')
