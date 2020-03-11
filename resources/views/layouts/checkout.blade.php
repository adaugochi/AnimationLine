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
<div class="loading hidden">
    <img src="{{ asset('images/loading.gif') }}">
</div>
<div>
    <nav class="navbar bg-brand-primary navbar-scrolling fixed-top">
        <marquee class="container">
            <span class="text-white">Get 10% OFF Your First Order With </span>
            <span class="box-text">Coupon Code: <b>NEW10.</b></span>
            <strong>Offer Ends March 20th 2020</strong>
        </marquee>
    </nav>
    <nav class="navbar navbar-expand-md bg-white navbar-dark navbar-wrapper" style="top: 40px; height: 80px">
        <div class="container">
            <div class="navbar-brand">
                <img src="{{ asset('img/logo.png') }}" class="navbar-logo">
            </div>
        </div>
    </nav>
    {{--<div class="row col-md-6 mx-auto">--}}
        {{--<h4 class="order-text">Complete Your Order</h4>--}}
    {{--</div>--}}
</div>

<main>
    @yield('content')
</main>

<section class="footer mt-5">
    <div class="copyright-footer container d-md-flex justify-content-md-between">
        <p>
            <span>© <?= date('Y'); ?> Active Mockup. All rights reserved. </span>
            <a class="text-brand-primary" href="#">www.activemockup.com</a>
        </p>

        <div>
            <span data-toggle="modal" data-target="#policyModal">
                <span class="text-gray">Privacy policy</span>
                @include('elements.modal', ['modalId' => 'policyModal', 'modalTitle' => 'Privacy Policy'])
            </span>
            <span data-toggle="modal" data-target="#tcModal" class="ml-3">
                <span class="text-gray">Terms & Conditions</span>
                @include('elements.modal', ['modalId' => 'tcModal', 'modalTitle' => 'Terms & Conditions'])
            </span>
        </div>
    </div>
</section>

<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
