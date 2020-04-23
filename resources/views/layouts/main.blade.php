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
                    <img src="{{ asset('img/logo.svg') }}" class="navbar-logo">
                </a>
                <span class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">
                    <i class="material-icons">menu</i>
                </span>
                <div class="collapse navbar-collapse justify-content-end" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li>
                            <a class="nav-link nav-active" href="/home">Dashboard</a>
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
    </header>

    <main class="mt-60 container" style="min-height: calc(100vh - 54px - 80px - 60px)">
        <section class="pb-100" >
            <h4 class="text-gray">
                <span class="font-paris">{{ $greeting }} </span>
                <span> - {{ ucfirst(auth()->user()->first_name) }}</span>
            </h4>
            @yield('content')
        </section>
    </main>
    <footer id="footer">
        @include('elements.sub-footer')
    </footer>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        let rapidApiKey = "{{ env('RAPID_API_KEY') }}";
        let IPToken = "{{ env('IP_TOKEN') }}"
    </script>
</body>
</html>
