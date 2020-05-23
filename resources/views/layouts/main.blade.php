<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('elements.head-tag')
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
    <header>
        <nav class="navbar navbar-expand-md bg-white navbar-dark navbar-wrapper">
            <div class="container">
                <a href="/" class="navbar-brand">
                    <img src="{{ asset('img/logo.svg') }}" class="navbar-logo" alt="AnimationLine Logo">
                </a>
                <span class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </span>
                <div class="collapse navbar-collapse justify-content-end" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li>
                            <a class="nav-link text-gray" href="/home">Dashboard</a>
                        </li>
                        <li class="ml-md-3">
                            @include('elements.logout-button')
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="mt-4 container" style="min-height: calc(100vh - 54px - 80px - 23px)">
        <section class="">
            <h4 class="text-gray">
                <span class="font-paris">{{ $greeting }} - {{ ucfirst(auth()->user()->first_name) }}</span>
            </h4>
            @yield('content')
        </section>
    </main>
    <footer id="footer">
        @include('elements.sub-footer', ['isPortal' => true])
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        let BaseURL = "{{ env('BASE_URL') }}"
    </script>
    @include('elements.flash-messages')
</body>
</html>
