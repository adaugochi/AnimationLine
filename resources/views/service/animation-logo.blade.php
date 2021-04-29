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
                        <h2 class="font-weight-bold text-brand-primary fs-50">$79</h2>
                        <p>720P video quality</p>
                        <p>custom colours</p>
                        <p>Delivered in 3 Days</p>
                        <p>1 review</p>
                        <p>1 version included</p>
                        <div>
                            <a class="btn btn-brand-primary btn-lg mt-2" href="{{ route('logo-bronze') }}">
                                Get Started
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card bg-lg card-scale">
                        <h5>Silver Package</h5>
                        <h2 class="font-weight-bold text-white fs-50">$149.99</h2>
                        <p>1080P video quality</p>
                        <p>Voiceover</p>
                        <p>Background Music</p>
                        <p>Overlay Text</p>
                        <p>Logo Transparency</p>
                        <p>3 reviews</p>
                        <p>Delivered in 4 Days</p>
                        <p>Custom Animation</p>
                        <p>custom colours</p>
                        <p>1 version included</p>
                        <div>
                            <a class="btn btn-brand-white-outline btn-lg mt-2" href="{{ route('logo-silver') }}">
                                Get Started
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card card-scale">
                        <h5>Gold Package</h5>
                        <h2 class="font-weight-bold text-brand-primary fs-50">$229.99</h2>
                        <p>4K video quality</p>
                        <p>Sound Effect</p>
                        <p>Voiceover</p>
                        <p>Background Music</p>
                        <p>Overlay Text</p>
                        <p>Perfect Loop</p>
                        <p>Logo Transparency</p>
                        <p>Unlimited reviews</p>
                        <p>Delivered in 5 Days</p>
                        <p>Custom Animation</p>
                        <p>custom colours</p>
                        <p>1 version included</p>
                        <div>
                            <a class="btn btn-brand-primary btn-lg mt-2" href="{{ route('logo-gold') }}">
                                Get Started
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection()