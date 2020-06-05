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
</div>

<main>
    <section class="py-100">
        <div class="container">
            <div class="card">
                <div class="mb-4">
                    <img src="{{ asset('blog/images/'. $blog->image_url) }}" class="w-100">
                </div>
                <h2>{{ $blog->title }}</h2>
                <p>{!! $blog->body !!}</p>
            </div>
        </div>
    </section>
    <section class="footer pt-5">
        @include('elements.footer')
        @include('elements.sub-footer', ['isPortal' => false])
    </section>
</main>

<script src="{{ asset('js/app.js') }}"></script>
@include('elements.flash-messages')
</body>
</html>