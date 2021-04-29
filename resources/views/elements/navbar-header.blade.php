<nav class="navbar navbar-expand-lg navbar-wrapper">
    <div class="container">
        <div class="navbar-brand">
            <img src="{{ asset('img/logo.svg') }}" class="navbar-logo" alt="AnimationLine Logo">
        </div>
        <span class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </span>
        <div class="collapse navbar-collapse justify-content-end" id="myNavbar">
            <ul class="nav navbar-nav ">
                <li><a class="nav-link nav-active" href="/">Home</a></li>
                @if(request()->route()->getName() === null)
                    <li><a class="nav-link nav-active" href="/#whyUs">Why Us</a></li>
                    <li><a class="nav-link nav-active" href="/#services">Services</a></li>
                @endif
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle text-gray" id="navbardrop" data-toggle="dropdown">
                        Pricing
                    </a>
                    <div class="dropdown-menu dropdown-custom-menu dropdown-menu-sm-right dropdown-menu-lg-left dropdown__custom-navbar">
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
                <li><a class="nav-link nav-active" href="{{ route('blog') }}">Blog</a></li>
                <li class="ml-3">
                    @if(\Auth::guard('web')->check())
                        @include('elements.logout-button')
                    @else
                        <a class="btn btn-brand-primary" href="{{ route('login') }}">Sign In</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>