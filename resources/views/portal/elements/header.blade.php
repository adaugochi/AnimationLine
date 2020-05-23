<nav class="navbar bg-white fixed-top main-header custom-navbar">
    <a class="custom-navbar__sidebar-toggle">
        <i class="fa fa-bars pl-2 custom-navbar__menu-bar"></i>
    </a>
    <div class="custom-navbar__logo pl-2">
        <img src="{{ asset('img/logo.svg') }}" alt="AnimationLine Logo" class="d-none d-md-block"/>
        <img src="{{ asset('img/logo.png') }}" alt="AnimationLine Logo" class="d-block d-md-none"/>
    </div>
    <div class="justify-content-end">
        <div class="dropdown cursor-pointer">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                <span class="image-name">{{ auth()->user()->getFullName() }}</span>
                <span class="nav-text mr-3">{{ auth()->user()->getFullName() }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">Logout</a>
            </div>
        </div>
    </div>
</nav>

