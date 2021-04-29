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

        @include('elements.navbar-header')
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
                        @if(\Auth::guard('web')->check())
                            <a href="{{ route('home') }}" class="btn-brand-white mt-3 py-3 btn px-5">
                                Go To Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn-brand-white mt-3 py-3 btn px-5">
                                Get Started
                            </a>
                        @endif
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
            @include('elements.footer')
            @include('elements.sub-footer', ['isPortal' => false])
        </section>
    </main>

    <script src="/js/app.js"></script>
    @include('elements.flash-messages')
</body>
</html>
