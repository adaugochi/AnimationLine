<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('elements.head-tag')
<body class="ht-100v">
    <main>
        <form method="POST" action="@yield('route')" class="validateForm">
            @csrf
            <div class="d-flex align-items-center justify-content-center ht-100v">
                <div>
                    <div class="text-center mb-3">
                        <a class="text-decoration-none" href="/">
                            <img src="{{ asset('img/logo.svg') }}" height="30">
                        </a>
                    </div>

                    <div class="wd-300 wd-xs-350 bg-white auth_wrapper">
                        @include('elements.flash-messages')
                        <div class="fs-28 mb-3 font-weight-lighter text-brand-primary">
                            @yield('auth-header')
                        </div>
                        @yield('content')
                    </div>
                </div>
            </div>
        </form>
    </main>

    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('scripts')
</body>
</html>