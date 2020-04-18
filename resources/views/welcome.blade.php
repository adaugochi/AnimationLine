@extends('layouts.app')
@section('title', 'Welcome')
@section('header-text', \App\Contants\Message::WELCOME_HEADER_TEXT)
@section('body-text', \App\Contants\Message::WELCOME_BODY_TEXT)
@section('image')
    <img src="{{ asset('img/header.svg') }}">
@endsection()
@section('content')
    <section id="whyUs" class="py-100">
        <div class="container text-center">
            <h1 class="page-title">Why Choose AnimationLine?</h1>
            <p>
                AnimationLine has been the #1 World Leading Video Animation Company . We are sure a trial
                will convince you, that's why we go above and beyond to create unique & professional
                Animation video at an affordable price.
            </p>

            <div class="mt-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-scale">
                            <img src="{{ asset('img/professional.svg') }}" class="card-image-width mx-auto d-block">
                            <h3 class="font-weight-bold my-4">Professional</h3>
                            <p class="fs-16">
                                Our team of experienced designers are on hand to awesome video animation for your business.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4 mt-md-0">
                        <div class="card card-scale">
                            <img src="{{ asset('img/affordable.svg') }}" class="card-image-width mx-auto d-block">
                            <h3 class="font-weight-bold my-4">Affordable</h3>
                            <p class="fs-16">
                                We pride ourselves on the most cost-effective video animation & understand the need to
                                keep costs low but quality high.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4 mt-md-0">
                        <div class="card card-scale">
                            <img src="{{ asset('img/perfection.svg') }}" class="card-image-width mx-auto d-block">
                            <h3 class="font-weight-bold my-4">Perfection</h3>
                            <p class="fs-16">
                                We're not happy until you are happy, that's why we offer a 100% money back guarantee
                                plus unlimited revisions are available
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="aboutUs" class="bg-white py-100">
        <div class="container text-center">
            <h1 class="page-title">About Us</h1>
            <p>
                AnimationLine is an online animation company that allows you to easily order for your
                professional animated videos for all industries in job roles like marketing, training, and eLearning.
            </p>
            <a href="/login" class="btn-brand-primary my-3 py-3 btn px-5">Get Started</a>
            
            <div class="row"></div>
        </div>
    </section>
    <section id="works" class="text-center text-white">
        <div class="container">
            <h1 class="page-title">How It Works</h1>
            <p>Our Simple Online Process Couldn't Be Easier...</p>

            <div class="mt-5">
                <div class="row">
                    <div class="col-md-3 steps-to">
                        <img src="{{ asset('img/shopping-cart.svg') }}" height="50">
                        <h1 class="font-weight-bold mt-3 text-brand-primary">01.</h1>
                        <h4 class="mt-3 fs-18">Place Your Order</h4>
                    </div>
                    <div class="col-md-3 mt-4 mt-md-0 steps-to">
                        <img src="{{ asset('img/payment.svg') }}" height="50">
                        <h1 class="font-weight-bold mt-3 text-brand-primary">02.</h1>
                        <h4 class="mt-3 fs-18">Proceed To Payment</h4>
                    </div>
                    <div class="col-md-3 mt-4 mt-md-0 steps-to">
                        <img src="{{ asset('img/copywriting.svg') }}" height="50">
                        <h1 class="font-weight-bold mt-3 text-brand-primary">03.</h1>
                        <h4 class="mt-3 fs-18">Give Us Your Brief</h4>
                    </div>
                    <div class="col-md-3 mt-4 mt-md-0 steps-to">
                        <img src="{{ asset('img/plane.svg') }}" height="50">
                        <h1 class="font-weight-bold mt-3 text-brand-primary">04.</h1>
                        <h4 class="mt-3 fs-18">Design Delivered</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="services" class="py-100 text-center">
        <div class="container">
            <h1 class="page-title mb-3">Our Services</h1>
            @include('elements.service', [
                'header' => 'Create Your Animation Video', 'addClass' => '', 'img' => 'img/video.svg'
            ])
            @include('elements.service', [
                'header' => 'Create Your Logo With Animation',
                'addClass' => 'service__inverted',
                'img' => 'img/logo-design.svg'
            ])
            @include('elements.service', [
                'header' => 'Make Your Photo Come Alive With Animation',
                'addClass' => '', 'img' => 'img/photo.svg'
            ])
        </div>
    </section>
    <section id="customer" class="py-100 bg-white text-center">
        <div class="container">
            <h1 class="page-title">What Our Customers Say</h1>
            <p>
                We have produced over 2000 App UI in the last 3 years & we have ensured that every single one
                of our customers are 100% happy with our design, that is why we constantly receive glowing
                feedback like some of the examples below.
            </p>

            <div class="row mt-5">
                <div class="col-md-4 mb-4">
                    <div class="card card-height customer">
                        <div class="mb-3">
                            <img src="{{ asset('images/customer2.jpg') }}" class="card-image-width bd-radius">
                        </div>
                        <h4>Michael Smith</h4>
                        <p class="page-title">Entrepreneur</p>
                        <div>
                            <p>
                                "This was not an easy script and to be honest I expected it to take longer.
                                When I showed it to others, was well above expectations."
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card card-height customer">
                        <div class="mb-3">
                            <img src="{{ asset('images/customer1.jpg') }}" class="card-image-width bd-radius">
                        </div>
                        <h4>Monika Kowalska</h4>
                        <p class="page-title">App Designer</p>
                        <div>
                            <p>
                                "Brilliant Animation Video. Followed my Script exactly and produced a fantastic
                                Animation video. Will definitely use it again"
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card card-height customer">
                        <div class="mb-3">
                            <img src="{{ asset('images/customer3.jpg') }}" class="card-image-width bd-radius">
                        </div>
                        <h4>Andy Bogacky</h4>
                        <p class="page-title">App Designer</p>
                        <div>
                            <p>
                                "I cannot recommend AnimationLine enough. I'm not very creative so i let them take
                                charge & they over delivered"
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pb-100 text-center">
        <div class="container">
            <h1>Happiness Guarantee</h1>
            <h5 class="page-title">Our 100% Money Back Guarantee</h5>
            <p>
                We're not happy until you are happy, that's why we offer a 100% money back guarantee plus unlimited
                revisions. If you are not happy with your design or you require any changes just let us know and
                we will be more than happy to edit the design or simply give you a full refund.
            </p>
            <h5 class="font-weight-bold">Ogundairo Abayomi</h5>
            <p>CEO,  AnimationLine</p>

            <div class="row mt-5 text-left">
                <div class="col-md-4">
                    <div class="feature-box mb-4 mb-md-0">
                        <div class="icon">
                            <i class="material-icons">check_circle_outline</i>
                        </div>
                        <div class="feature-content">
                            <h5>30 Days Refund Policy</h5>
                            <p>
                                If you are not 100% satisfied with your order, you have 30 days to request a full refund.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box mb-4 mb-md-0">
                        <div class="icon">
                            <i class="material-icons">lock_outline</i>
                        </div>
                        <div class="feature-content">
                            <h5>Your Data is Secure</h5>
                            <p>
                                We use a 256-bit encryption protocol to keep your private data secure at all times.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="icon">
                            <i class="material-icons">contact_support</i>
                        </div>
                        <div class="feature-content">
                            <h5>Customer Support</h5>
                            <p class="mb-2">
                                For support, contact
                                <span class="text-brand-primary text-underline">support@animationline.com</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection()
