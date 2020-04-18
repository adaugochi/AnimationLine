<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AnimationLine - @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/material-icons-min.css') }}" />
</head>
<body class="ht-100v">
    <nav class="navbar bg-brand-primary navbar-scrolling fixed-top">
        <marquee class="container">
            <span class="text-white">Get 10% OFF Your First Order With</span>
            <span class="box-text">Coupon Code: <b>NEW10.</b></span>
            <strong>Offer Ends March 20th 2020</strong>
        </marquee>
    </nav>
    <div class="bg-white">
        <nav class="navbar navbar-expand-lg bg-white navbar-dark navbar-wrapper tp-40px">
            <div class="container">
                <div class="navbar-brand">
                    <img src="{{ asset('img/logo.svg') }}" class="navbar-logo">
                </div>
                <span class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">
                    <i class="material-icons">menu</i>
                </span>
                <div class="collapse navbar-collapse justify-content-end" id="myNavbar">
                    <ul class="nav navbar-nav ">
                        <li><a class="nav-link nav-active" href="/">Home</a></li>
                        <li><a class="nav-link nav-active" href="/#whyUs">Why Us</a></li>
                        <li><a class="nav-link nav-active" href="/#aboutUs">About Us</a></li>
                        <li><a class="nav-link nav-active" href="/#services">Services</a></li>
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle text-gray" id="navbardrop" data-toggle="dropdown">
                                Pricing
                            </a>
                            <div class="dropdown-menu dropdown-menu-sm-right dropdown-menu-lg-left dropdown__custom-navbar">
                                <a class="dropdown-item" href="{{ route('animation-logo') }}">
                                    Create your logo with animation
                                </a>
                                <a class="dropdown-item" href="{{ route('animation-video') }}">
                                    Create animation video
                                </a>
                                <a class="dropdown-item" href="{{ route('animation-photo') }}">
                                    Make your photo come alive with animation
                                </a>
                            </div>
                        </li>
                        <li><a class="nav-link nav-active" href="/contact">Contact Us</a></li>
                        <li><a class="nav-link nav-active" href="#">Blog</a></li>
                        <li class="p-10-15">
                            <a class="btn btn-brand-primary-outline" href="/login">Sign In</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container mt-0 mt-md-5">
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
                            <a href="/" class="text-decoration-none text-white">
                                <i class="fa fa-thumb-tack text-brand-primary mr-1"></i>
                                Blog
                            </a>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <label class="footer-label fs-20">Contact Us</label>
                        <p>
                            <i class="fa fa-clock-o text-brand-primary mr-1"></i>
                            Mon - Sat 9:00 a.m. - 5:00 p.m. Sunday Closed
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
            @include('elements.sub-footer')
        </section>
    </main>

<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
