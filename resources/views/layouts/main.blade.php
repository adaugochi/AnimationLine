<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/material-icons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Parisienne&display=swap" rel="stylesheet"></head>
<body>
    <?php
        $time = date("H");
        $timezone = date("e");
        $greeting = '';

        if ($time < "12") {
            $greeting = "Good Morning";
        } elseif ($time >= "12" && $time < "17") {
            $greeting = "Good Afternoon";
        } elseif ($time >= "17" && $time < "19") {
            $greeting = "Good Evening";
        } elseif ($time >= "19") {
            $greeting = "Good Night";
        }
    ?>
        <nav class="navbar bg-brand-primary navbar-scrolling fixed-top">
            <marquee class="container">
                <span class="text-white">Get 10% OFF Your First Order With </span>
                <span class="box-text">Coupon Code: <b>NEW10.</b></span>
                <strong>Offer Ends March 20th 2020</strong>
            </marquee>
        </nav>
        <nav class="navbar navbar-expand-md bg-white navbar-dark navbar-wrapper">
            <div class="container">
                <a href="/" class="navbar-brand">
                    <img src="{{ asset('img/logo.svg') }}" class="navbar-logo">
                </a>
                <span class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">
                    <i class="material-icons">menu</i>
                </span>
                <div class="collapse navbar-collapse justify-content-end" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li>
                            <a class="nav-link" href="/home">Dashboard</a>
                        </li>
                        <li class="p-10-15">
                            <a class="btn btn-brand-primary-outline btn-small" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                               {{ __('LOGOUT') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    <main class="mt-60 container">
        <h4 class="text-gray">
            <span class="font-paris">{{ $greeting }} </span>
            <span> - {{ auth()->user()->first_name }}</span>
        </h4>
        @yield('content')
    </main>

    <section class="footer">
        <div class="copyright-footer container text-center">
            <p>
                <span>© <?= date('Y'); ?> Animation Line. All rights reserved. </span>
                <a class="text-brand-primary" href="/">www.animationline.com</a>
            </p>
        </div>
    </section>

<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
