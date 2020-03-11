@extends('layouts.checkout')
@section('content')
    <div style="margin-top: 60px">
        <div class="container">
            <div class="mx-auto mb-5">
                <div class="card">
                    <div class="card-title">
                        <h3 class="font-weight-bold">Billing Details</h3>
                    </div>
                    <form class="card-form__wrapper">
                        @include('elements.billing-form')

                        <div class="basic-payment__wrapper my-5">
                            <h3>Payment Details</h3>
                            <p>
                                By clicking on the button below, <strong>you will be transferred to PayPal</strong> to
                                log in and confirm your payment. Then, you will be redirected back to finalize your order.
                            </p>

                            <div class="basic-payment__card-box">
                                <h4>Standard Package</h4>
                                <hr class="line">
                                <div class="d-flex justify-content-between">
                                    <p>Amount</p>
                                    <p>USD 199.10</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p>Sales Tax (0%)</p>
                                    <p>USD 0.00</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <input type="text" class="card-form__input form-control">
                                    <button class="btn btn-brand-primary ml-3">Apply</button>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <h4 class="font-weight-bold">Total</h4>
                                    <h4 class="font-weight-bold">USD 199.10</h4>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-brand-primary btn-block">SUBMIT PAYMENT</button>
                    </form>
                </div>
            </div>

            @include('elements.feature')
        </div>
    </div>
@endsection()