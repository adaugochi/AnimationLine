@extends('layouts.main')
@section('content')
    <div style="margin-top: 60px">
        <div class="container">
            <div class="mx-auto mb-5">
                <div class="card">
                    <form class="card-form__wrapper" method="post" action="/submit-payemnt">
                        @csrf
                        <input type="hidden" name="sale_amount" value="{{ $amount }}" id="saleAmt">
                        <input type="hidden" name="discount_price" value="0.00" id="discount">
                        <input type="hidden" name="total_amount" value="{{ $amount }}" id="totalAmt">

                        <div class="basic-payment__wrapper mb-5">
                            <h3>Payment Details</h3>
                            <p>
                                By clicking on the button below, <strong>you will be transferred to PayPal</strong> to
                                log in and confirm your payment. Then, you will be redirected back to finalize your order.
                            </p>

                            <div class="basic-payment__card-box">
                                <h4>{{ $package }} Package</h4>
                                <hr class="line">
                                <div class="d-flex justify-content-between">
                                    <p>Amount</p>
                                    <p>
                                        <span>USD</span>
                                        <span class="sale-amount">{{ $amount }}</span>
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p>Discount</p>
                                    <p>
                                        <span>USD</span>
                                        <span class="discount">0.00</span>
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <input type="text" class="card-form__input form-control coupon-code">
                                    <button class="btn btn-brand-primary ml-3 apply-coupon">Apply</button>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <h4 class="font-weight-bold">Total</h4>
                                    <h4 class="font-weight-bold">
                                        <span>USD</span>
                                        <span class="total-amount">{{ $amount }}</span>
                                    </h4>
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