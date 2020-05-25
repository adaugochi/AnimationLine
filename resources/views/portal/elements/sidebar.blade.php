<aside id="main-sidebar" class="main-sidebar">
    <section class="sidebar">
        <ul class="side-menu">
            <li>
                <a href="{{ route('admin.home') }}">
                    <i class="fa fa-home md-48 icon" aria-hidden="true"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.order') }}">
                    <i class="fa fa-shopping-bag md-48 icon" aria-hidden="true"></i>
                    <span class="nav-label">Orders</span>
                </a>
            </li>
            <li>
                <div data-toggle="collapse" data-target="#subMenu1">
                    <i class="fa fa-users md-48 icon" aria-hidden="true"></i>
                    <span class="nav-label">Users<i class="pl-2 fa fa-caret-down"></i></span>
                </div>
                <div id="subMenu1" class="sub-menu collapse">
                    <span class="sub-menu__items">
                        <a href="{{ route('user.client') }}">
                            <span class="">Clients</span>
                        </a>
                    </span>
                    <span class="sub-menu__items">
                        <a href="{{ route('user.admin') }}">
                            <span class="">Admin</span>
                        </a>
                    </span>
                </div>
            </li>
            {{--<li>--}}
                {{--<a href="" data-toggle="collapse" data-target="#subMenu4">--}}
                    {{--<i class="md-48 icon material-icons">settings</i>--}}
                    {{--<span class="nav-label">--}}
                        {{--Settings--}}
                    {{--</span>--}}
                {{--</a>--}}
            {{--</li>--}}
        </ul>
    </section>
</aside>
