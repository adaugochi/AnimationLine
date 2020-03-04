<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/material-icons-min.css') }}" />
</head>
<body>
    <div class="header-bg">
        <nav class="navbar bg-brand-primary navbar-scrolling fixed-top">
            <marquee class="container">
                <span class="text-white">Get 10% OFF Your First Order With </span>
                <span class="box-text">Coupon Code: <b>NEW10.</b></span>
                <strong>Offer Ends March 20th 2020</strong>
            </marquee>
        </nav>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark navbar-wrapper" style="top: -63px;">
            <div class="container">
                <div class="navbar-brand">
                    <img src="{{ asset('img/logo.png') }}" class="navbar-logo">
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
                            <a class="nav-link" href="#ourDesigns">Our Work</a>
                        </li>
                        <li>
                            <a class="nav-link" href="#pricing">Pricing</a>
                        </li>
                        <li>
                            <a class="btn btn-brand-primary-outline btn-small mt-2" href="#">Get Started</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-8 mt-5 mx-auto header-content text-center text-white">
                    <div class="header-text">
                        <h2>Get a Professionally Designed App UI Mockup, from the World #1Mockup Design Company</h2>
                        <a href="#">
                            <div class="btn-brand-primary btn-pill mt-3 btn">
                                <span class="d-inline-block text-decoration-none">
                                    Get Started
                                </span>
                                <button class="d-none d-inline-block btn pt-1 btn-circle">
                                    <i class="material-icons">flash_on</i>
                                </button>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main>
        @yield('content')
    </main>

<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
