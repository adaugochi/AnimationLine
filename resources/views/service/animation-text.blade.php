@extends('layouts.app')
@section('title', 'Pricing')
@section('header-text', \App\Contants\Message::PRICING_HEADER_TEXT)
@section('body-text', \App\Contants\Message::PRICING_BODY_TEXT)
@section('image')
    <img src="{{ asset('img/pricing.svg') }}">
@endsection()
@section('content')
    <section id="pricing" class="py-100 text-center">
        <div class="container">
            <h2 class="page-title">Pricing</h2>
            <p class="fs-18">
                In case you desire more than the packages listed below or you wish for a custom animation, kindly
                send an email to <span class="text-brand-primary">support@animationline.com</span>
                and we will send get back to you as early as possible.
            </p>
            <div class="row mt-5">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card card-scale">
                        <h5>Bronze Package</h5>
                        <h2 class="font-weight-bold text-brand-primary fs-50">$94.99</h2>
                        <p>8 No. of Titles</p>
                        <p>720P Video Quality</p>
                        <p>Overlay Text</p>
                        <p>Transparency Background</p>
                        <p>1 Review</p>
                        <p>Delivered in 4 Days</p>
                        <p>custom colours</p>
                        <div>
                            <a class="btn btn-brand-primary btn-lg mt-2" href="{{ route('text-bronze') }}">
                                Get Started
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card bg-lg card-scale">
                        <h5>Silver Package</h5>
                        <h2 class="font-weight-bold text-white fs-50">$129.99</h2>
                        <p>20 No. of Titles</p>
                        <p>1080P Video Quality</p>
                        <p>Background Music</p>
                        <p>Overlay Text</p>
                        <p>Transparency Background</p>
                        <p>3 Reviews</p>
                        <p>Delivered in 5 Days</p>
                        <p>custom colours</p>
                        <div>
                            <a class="btn btn-brand-white-outline btn-lg mt-2" href="{{ route('text-silver') }}">
                                Get Started
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card card-scale pb-md-6">
                        <h5>Gold Package</h5>
                        <h2 class="font-weight-bold text-brand-primary fs-50">$239.99</h2>
                        <p>35 No. of Titles</p>
                        <p>1080P Video Quality</p>
                        <p>Background Music</p>
                        <p>Overlay Text</p>
                        <p>Transparency Background</p>
                        <p>5 Reviews</p>
                        <p>Delivered in 7 Days</p>
                        <p>custom colours</p>
                        <div>
                            <a class="btn btn-brand-primary btn-lg mt-2" href="{{ route('text-gold') }}">
                                Get Started
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection()