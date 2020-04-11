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
                            <a class="nav-link" href="#pricing">Pricing</a>
                        </li>
                        <li class="p-10-15">
                            <a class="btn btn-brand-primary-outline" href="/login">Get Started</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container" >
            <div class="row header-wrapper">
                <div class="col-md-5 my-5 header-content text-md-left text-center">
                    <div class="header-text">
                        <h1 class="text-brand-primary font-weight-bold">Let handle your Animation for you </h1>
                        <p class="text-gray fs-18">
                            Get a professionally designed animation videos from the world #1 Animation video Company
                        </p>
                        <a href="/login" class="btn-brand-white mt-3 py-3 btn px-5">Get Started</a>
                    </div>
                </div>
                <div class="col-md-7">
                    <img src="{{ asset('img/header.svg') }}">
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
