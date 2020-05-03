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
            <p class="fs-18">
                AnimationLine has been the #1 World Leading Video Animation Company . We are sure a trial
                will convince you, that's why we go above and beyond to create unique & professional
                Animation video at an affordable price.
            </p>

            <div class="mt-5">
                <div class="row">
                    @include('elements.why', [
                        'img' => 'img/professional.svg',
                        'header' => 'Professional', 'mt4' => '',
                        'body' => 'Our team of experienced designers are on hand to create an awesome
                                   video animation for your business.'
                    ])
                    @include('elements.why', [
                        'img' => 'img/affordable.svg',
                        'header' => 'Affordable', 'mt4' => 'mt-4',
                        'body' => 'We pride ourselves on the most cost-effective video animation & understand
                                   the need to keep costs low but quality high.'
                    ])
                    @include('elements.why', [
                        'img' => 'img/perfection.svg',
                        'header' => 'Perfection', 'mt4' => 'mt-4',
                        'body' => "We're not happy until you are happy, that's why we offer a 100% money back
                                   guarantee plus unlimited revisions are available"
                    ])
                </div>
            </div>
        </div>
    </section>
    <section id="works" class="text-center text-white">
        <div class="container">
            <h1 class="page-title">How It Works</h1>
            <p class="fs-18">Our Simple Online Process Couldn't Be Easier...</p>

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
                        <h4 class="mt-3 fs-18">Service Delivered</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="services" class="py-100 text-center">
        <div class="container">
            <h1 class="page-title mb-4 mb-md-3">Our Services</h1>
            @include('elements.service', [
                'header' => 'Create A 2D Animation Video',
                'addClass' => '', 'img' => 'img/video.gif',
                'body' => 'Create a professional and high-quality animation video that will capture
                           your audience and boost your sales revenue.',
                'link' => '/animation-video'
            ])
            @include('elements.service', [
                'header' => 'Create Your Logo With Animation',
                'addClass' => 'service__inverted',
                'img' => 'img/logo.gif',
                'link' => '/animation-logo',
                'body' => 'Do you wish for your Logo to come alive? We will transform your logo into
                           an awesome 3D moving animation video.'
            ])
            @include('elements.service', [
                'header' => 'Create A Kinetic Text Typography Animation',
                'addClass' => '', 'img' => 'img/text.gif',
                'link' => '/animation-text',
                'body' => 'Design your text and make them attractive and engaging to the audience.
                           Make your words captivating and creative'
            ])
        </div>
    </section>
    <section id="customer" class="py-100 bg-white text-center">
        <div class="container">
            <h1 class="page-title">What Our Customers Say</h1>
            <p class="fs-18">
                We have produced over 2000 App UI in the last 3 years & we have ensured that every single one
                of our customers is 100% happy with our design, that is why we constantly receive glowing
                feedback like some of the examples below.
            </p>
            <div class="row mt-5">
                @include('elements.customers', [
                    'img' =>  'images/customer2.jpeg',
                    'customerName' => 'Michael Adewunmi',
                    'customerOccupation' => 'Entrepreneur',
                    'comment' => "This was not an easy script and to be honest I expected it to take longer.
                    When I showed it to others, was well above expectations."
                ])
                @include('elements.customers', [
                    'img' =>  'images/customer1.jpg',
                    'customerName' => 'Monika Kowalska',
                    'customerOccupation' => 'App Designer',
                    'comment' => "Brilliant Animation Video. Followed my Script exactly and produced a fantastic
                    Animation video. Will definitely use it again"
                ])
                @include('elements.customers', [
                    'img' =>  'images/customer3.jpg',
                    'customerName' => 'Andy Bogacky',
                    'customerOccupation' => 'App Designer',
                    'comment' => "I cannot recommend AnimationLine enough. I'm not very creative so I let them take
                                charge & they over delivered"
                ])
            </div>
        </div>
    </section>
    <section class="py-100 text-center">
        <div class="container">
            <h1>Happiness Guarantee</h1>
            <h5 class="page-title">Our 100% Money Back Guarantee</h5>
            <p class="fs-18">
                We're not happy until you are happy, that's why we offer a 100% money back guarantee plus unlimited
                revisions. If you are not happy with your design or you require any changes just let us know and
                we will be more than happy to edit the design or simply give you a full refund.
            </p>
            <h5 class="font-weight-bold">Ogundairo Abayomi</h5>
            <p>CEO,  AnimationLine</p>

            <div class="row mt-5 text-left">
                @include('elements.guarantee', [
                    'iconName' => 'check_circle_outline',
                    'header' => '30 Days Refund Policy',
                    'body' => 'If you are not 100% satisfied with your order, you have 30 days to request a full refund.'
                ])
                @include('elements.guarantee', [
                    'iconName' => 'lock_outline',
                    'header' => 'Your Data is Secure',
                    'body' => 'We use a 256-bit encryption protocol to keep your private data secure at all times.'
                ])
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
