<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anination Line - @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/material-icons-min.css') }}" />
</head>
<body class="ht-100v">
    <nav class="navbar bg-brand-primary navbar-scrolling fixed-top">
        <marquee class="container">
            <span class="text-white">Get 10% OFF Your First Order With </span>
            <span class="box-text">Coupon Code: <b>NEW10.</b></span>
            <strong>Offer Ends March 20th 2020</strong>
        </marquee>
    </nav>
    <div class="bg-white">
        <nav class="navbar navbar-expand-md bg-white navbar-dark navbar-wrapper">
            <div class="container">
                <div class="navbar-brand">
                    <img src="{{ asset('img/logo.svg') }}" class="navbar-logo">
                </div>
                <span class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">
                    <i class="material-icons">menu</i>
                </span>
                <div class="collapse navbar-collapse justify-content-end" id="myNavbar">
                    <ul class="nav navbar-nav ">
                        <li>
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li>
                            <a class="nav-link" href="#whyUs">Why Us</a>
                        </li>
                        <li>
                            <a class="nav-link" href="#aboutUs">About Us</a>
                        </li>
                        <li>
                            <a class="nav-link" href="/pricing">Pricing</a>
                        </li>
                        <li>
                            <a class="nav-link" href="/contact">Contact Us</a>
                        </li>
                        <li class="p-10-15">
                            <a class="btn btn-brand-primary-outline" href="/login">Sign In</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container" >
            <div class="row header-wrapper">
                <div class="col-md-5 my-5 header-content text-md-left text-center">
                    <div class="header-text">
                        <h1 class="text-brand-primary font-weight-bold">
                            @yield('header-text')
                        </h1>
                        <p class="text-gray fs-18">
                            @yield('body-text')
                        </p>
                        <a href="/login" class="btn-brand-white mt-3 py-3 btn px-5">Get Started</a>
                    </div>
                </div>
                <div class="col-md-7">
                    @yield('image')
                </div>
            </div>
        </div>
    </div>

    <main>
        @yield('content')
        <section class="footer pt-5">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="navbar-brand">
                            <img src="{{ asset('img/logo.png') }}" class="footer-logo">
                        </div>
                        <p class="text-left">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                            ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                    <div class="col-md-4">
                        <label class="footer-label fs-20">Quick Links</label>
                        <p data-toggle="modal" data-target="#policyModal" class="cursor-pointer">
                            <span>
                                <i class="fa fa-thumb-tack text-brand-primary mr-1"></i>
                                Privacy policy
                            </span>
                            @include('elements.modal', ['modalId' => 'policyModal', 'modalTitle' => 'Privacy Policy'])
                        </p>
                        <p data-toggle="modal" data-target="#tcModal" class="cursor-pointer">
                            <span>
                                <i class="fa fa-thumb-tack text-brand-primary mr-1"></i>
                                Terms & Conditions
                            </span>
                            @include('elements.modal', ['modalId' => 'tcModal', 'modalTitle' => 'Terms & Conditions'])
                        </p>
                        <p class="cursor-pointer">
                            <a href="#about" class="text-decoration-none text-white">
                                <i class="fa fa-thumb-tack text-brand-primary mr-1"></i>
                                About Us
                            </a>
                        </p>
                        <p class="cursor-pointer">
                            <a href="/pricing" class="text-decoration-none text-white">
                                <i class="fa fa-thumb-tack text-brand-primary mr-1"></i>
                                Pricing
                            </a>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <label class="footer-label fs-20">Contact Us</label>
                        <p>
                            <i class="fa fa-clock-o text-brand-primary mr-1"></i>
                            Mon - Sat 9:00 a.m. - 6:00 p.m. Sunday Closed
                        </p>
                        <p>
                            <i class="fa fa-map-marker text-brand-primary mr-1"></i>
                            123 Main Street, Lekki, Lagos State Nigeria
                        </p>
                        <p>
                            <i class="fa fa-phone text-brand-primary mr-1"></i>
                            +234-900-700-1005, +234-800-611-2227
                        </p>
                        <p>
                            <i class="fa fa-envelope text-brand-primary mr-1"></i>
                            support@animationline.com
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-darker">
                <div class="container copyright-footer d-md-flex justify-content-between">
                    <p>
                        <span>© Copyright <?= date('Y'); ?> Animation Line. All rights reserved. </span>
                        <a class="text-brand-primary" href="https://animationline.com">www.animationline.com</a>
                    </p>
                    <div class="mt-3 mt-md-0">
                        <a class="mr-3 text-decoration-none" href="#" target="_blank">
                            <i class="fa fa-youtube-play fs-20 text-white"></i>
                        </a>
                        <a class="mr-3 text-decoration-none" href="#" target="_blank">
                            <i class="fa fa-instagram fs-20 text-white"></i>
                        </a>
                        <a class="mr-3 text-decoration-none" href="#" target="_blank">
                            <i class="fa fa-twitter fs-20 text-white"></i>
                        </a>
                        <a class="mr-3 text-decoration-none" href="https://fb.me/Animationline2020" target="_blank">
                            <i class="fa fa-facebook fs-20 text-white"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
