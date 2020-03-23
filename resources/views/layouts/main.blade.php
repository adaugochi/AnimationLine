<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/material-icons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div>
        <nav class="navbar bg-brand-primary navbar-scrolling fixed-top">
            <marquee class="container">
                <span class="text-white">Get 10% OFF Your First Order With </span>
                <span class="box-text">Coupon Code: <b>NEW10.</b></span>
                <strong>Offer Ends March 20th 2020</strong>
            </marquee>
        </nav>
        <nav class="navbar navbar-expand-md bg-white navbar-dark navbar-wrapper" style="top: 40px;">
            <div class="container">
                <div class="navbar-brand">
                    <img src="{{ asset('img/logo.png') }}" class="navbar-logo">
                </div>
                <span class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">
                <i class="material-icons text-gray">menu</i>
            </span>
                <div class="collapse navbar-collapse justify-content-end" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li>
                            <a class="btn btn-brand-primary-outline btn-small mt-2" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                               {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <main>
        @yield('content')
    </main>

    <section class="footer mt-5">
        <div class="copyright-footer container d-md-flex justify-content-md-between">
            <p>
                <span>© <?= date('Y'); ?> Active Mockup. All rights reserved. </span>
                <a class="text-brand-primary" href="/">www.activemockup.com</a>
            </p>

            <div>
                <span data-toggle="modal" data-target="#policyModal">
                    <span>Privacy policy</span>
                    @include('elements.modal', ['modalId' => 'policyModal', 'modalTitle' => 'Privacy Policy'])
                </span>
                <span data-toggle="modal" data-target="#tcModal" class="ml-3">
                    <span>Terms & Conditions</span>
                    @include('elements.modal', ['modalId' => 'tcModal', 'modalTitle' => 'Terms & Conditions'])
                </span>
            </div>
        </div>
    </section>

<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
