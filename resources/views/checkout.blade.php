@extends('layouts.main')
@section('content')
    <div class="mt-60">
        <div class="container">
            <div class="mx-auto mb-5">
                <div class="card">
                    <form class="card-form__wrapper validateForm" method="post" action="{{ route('create-payment') }}">
                        @csrf
                        <input type="hidden" name="sales_amount" value="{{ $amount }}" id="saleAmt">
                        <input type="hidden" name="discount_price" value="0" id="discount">
                        <input type="hidden" name="total_amount" value="{{ $amount }}" id="totalAmt">
                        <input type="hidden" name="package" value="{{ $package }}">

                        <div>
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="card-form__label">City<span class="text-danger">*</span></label>
                                    <input type="text" name="city" class="form-control card-form__input">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="card-form__label">Postal Code</label>
                                    <input type="text" name="postal_code" class="card-form__input form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="card-form__label">Country<span class="text-danger">*</span></label>
                                    <input type="text" name="country" class="card-form__input form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="card-form__label">State<span class="text-danger">*</span></label>
                                    <input type="text" name="state" class="card-form__input form-control">
                                </div>
                            </div>
                        </div>

                        <div class="basic-payment__wrapper my-5">
                            <h3>Payment Details</h3>
                            <p>
                                By clicking on the button below, <strong>you will be transferred to PayPal</strong> to
                                log in and confirm your payment. Then, you will be redirected back to finalize your order.
                            </p>

                            <div class="basic-payment__card-box">
                                <h4>{{ ucfirst($package) }} Package</h4>
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
                                @if($hasDiscount < 1)
                                    <div class="d-flex justify-content-between discount-field">
                                        <div>
                                            <input type="text" class="card-form__input form-control coupon-code">
                                            <p class="fs-12 text-danger d-none err-text">
                                                You enter an incorrect coupon code
                                            </p>
                                        </div>
                                        <div>
                                            <button class="btn btn-brand-primary ml-3 apply-coupon">Apply</button>
                                        </div>
                                    </div>
                                    <div class="d-none justify-content-between discount-success">
                                        <span class="text-success fs-20">Discount Applied Sucessfully</span>
                                        <span><i class="material-icons text-success fs-28">check</i></span>
                                    </div>
                                @endif
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
                        <button class="btn btn-brand-primary btn-block btn-lg">PAY WITH PAYPAL</button>
                    </form>
                </div>
            </div>

            @include('elements.feature')
        </div>
    </div>
@endsection()