<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('elements.head-tag')
<body>
    <button class="btn btn-brand-primary btn-scroll">
        <i class="fa fa-angle-up text-white" aria-hidden="true"></i>
    </button>
    <div class="bg-white">
        {{--<nav class="navbar bg-brand-primary navbar-scrolling fixed-top">--}}
            {{--<marquee class="container">--}}
                {{--<span class="text-white">Get 10% OFF Your First Order With</span>--}}
                {{--<span class="box-text">Coupon Code: <b>NEW10.</b></span>--}}
                {{--<strong>Offer Ends March 20th 2020</strong>--}}
            {{--</marquee>--}}
        {{--</nav>--}}

        <nav class="navbar navbar-expand-lg navbar-wrapper">
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
                                    Create your 2D animation video
                                </a>
                                <a class="dropdown-item" href="{{ route('animation-text') }}">
                                    Create your kinetic text typography animation
                                </a>
                            </div>
                        </li>
                        <li><a class="nav-link nav-active" href="{{ route('contact') }}">Contact Us</a></li>
                        <li><a class="nav-link nav-active" href="#">Blog</a></li>
                        <li class="ml-3">
                            <a class="btn btn-brand-primary" href="{{ route('login') }}">Sign In</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container mt-0">
            <div class="row header-wrapper">
                <div class="col-md-6 col-lg-5 py-5 py-md-0 pt-lg-5 text-md-left text-center">
                    <div class="header-text">
                        <h1 class="font-weight-bold">
                            @yield('header-text')
                        </h1>
                        <p class="text-gray fs-18 ">
                            @yield('body-text')
                        </p>
                        <a href="{{ route('login') }}" class="btn-brand-white mt-3 py-3 btn px-5">Get Started</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-7">
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
                    <div class="col-md-5 col-lg-4">
                        <div class="navbar-brand">
                            <img src="{{ asset('img/logo-white.png') }}" class="footer-logo">
                        </div>
                        <p class="text-left">
                            AnimationLine is an online animation company that allows you to easily order for your
                            professional animated videos for all industries in job roles like marketing, training,
                            and eLearning.
                        </p>
                    </div>
                    <div class="col-md-3 col-lg-4">
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
                            <a href="{{ route('contact') }}" class="text-decoration-none text-white">
                                <i class="fa fa-thumb-tack text-brand-primary mr-1"></i> Contact
                            </a>
                        </p>
                        <p class="cursor-pointer">
                            <a href="/" class="text-decoration-none text-white">
                                <i class="fa fa-thumb-tack text-brand-primary mr-1"></i> Blog
                            </a>
                        </p>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <label class="footer-label fs-20">Locate Us</label>
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
                            +234-708-177-5767, +234-813-095-9873
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
