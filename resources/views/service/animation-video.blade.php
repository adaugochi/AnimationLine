@extends('layouts.app')
@section('title', 'Pricing')
@section('header-text', \App\Contants\Message::PRICING_HEADER_TEXT)
@section('body-text', \App\Contants\Message::PRICING_BODY_TEXT)
@section('image')
    <img src="{{ asset('img/video.svg') }}">
@endsection()
@section('content')
    <section id="pricing" class="py-100 text-center">
        <div class="container">
            <h2 class="page-title">Pricing</h2>
            <p class="fs-18">
                In case you desire more than the packages listed above or you wish for a custom animation, kindly
                send an email to <span class="text-brand-primary">support@animationline.com</span>
                and we will send get back to you as early as possible.
            </p>
            <div class="row mt-5">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card card-scale">
                        <h5>Bronze Package</h5>
                        <h2 class="font-weight-bold text-brand-primary fs-50">$99.99</h2>
                        <p>720P video quality</p>
                        <p>Background music</p>
                        <p>120 No. of words</p>
                        <p>Delivered in 5 Days</p>
                        <p>Up to 3 reviews</p>
                        <div>
                            <a class="btn btn-brand-primary btn-lg mt-2" href="{{ route('video-bronze') }}">
                                Get started
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card bg-lg card-scale">
                        <h5>Silver Package</h5>
                        <h2 class="font-weight-bold text-white fs-50">$199.99</h2>
                        <p>720P video quality</p>
                        <p>Voiceover</p>
                        <p>Background music</p>
                        <p>Up to 300 No. of words</p>
                        <p>Delivered in 10 Days</p>
                        <p>Up to 5 reviews</p>
                        <div>
                            <a class="btn btn-brand-white-outline btn-lg mt-2" href="{{ route('video-silver') }}">
                                Get started
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card card-scale pb-md-6">
                        <h5>Gold Package</h5>
                        <h2 class="font-weight-bold text-brand-primary fs-50">$299.99</h2>
                        <p>1080P video quality</p>
                        <p>Voiceover</p>
                        <p>Background music</p>
                        <p>Up to 500 No. of words</p>
                        <p>Delivered in 14 Days</p>
                        <p>Up to 7 reviews</p>
                        <div>
                            <a class="btn btn-brand-primary btn-lg mt-2" href="{{ route('video-gold') }}">
                                Get started
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection()