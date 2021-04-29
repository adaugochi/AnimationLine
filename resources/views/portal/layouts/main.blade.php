<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | AnimationLine </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/portal.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Parisienne&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        @include('portal.elements.sidebar')
        <div class="content-wrapper ">
            @include('portal.elements.header')
            <section class="content">
                <section class="content-header">
                    <div class="clearfix">
                        <div class="row">
                            <div class="col-md-7">
                                <h1 class="content-header__title">
                                    @yield('title') @yield('content-header-right')
                                </h1>
                                <ol class="breadcrumb">
                                    <li><a href="/">Home</a></li>
                                    @yield('header-breadcrumb')
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="content-body">
                    @yield('content-body')
                </section>
                @include('portal.elements.footer')
            </section>
        </div>
    </div>

    <script src="{{ asset('js/portal.js') }}"></script>
    @include('elements.flash-messages')
</body>
</html>