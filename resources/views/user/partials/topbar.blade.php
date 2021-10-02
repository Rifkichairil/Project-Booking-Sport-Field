 <!-- Topbar Start -->
 <div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

<!--        <li class="d-none d-sm-block">
            <form class="app-search" role="search" action="{{route('search')}}" method="get">
                <div class="app-search-box">
                    <div class="input-group">
                        <input class="form-control" name="q" type="search" value="" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn" type="submit">
                                <i class="fe-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </li> -->

        <li class="dropdown notification-list">
            @if (Auth::guest('auth.user'))
            <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="fe-user noti-icon"></i>
            </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <a href="{{route('user.login')}}" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>Login</span>
                    </a>
                    <a href="{{route('user.register')}}" class="dropdown-item notify-item">
                        <i class="fe-log-in"></i>
                        <span>Register</span>
                    </a>


                </div>
            @else
                <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fe-user noti-icon"></i>
                    {{Auth::user()->first_name}}
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="{{route('user.profile')}}" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>My Account</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <form action="{{route('user.logout')}}" method="post">
                        {!! csrf_field() !!}
                        <button type="submit" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </button>
                    </form>

                </div>
            @endif
        </li>
    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="index.html" class="logo text-center">
            <span class="logo-lg">
            <img src="{{asset('bold/assets/images/logo-light.png')}}" alt="" height="40">
                <!-- <span class="logo-lg-text-light">UBold</span> -->
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-sm-text-dark">U</span> -->
            <img src="{{asset('bold/assets/images/logo-sm.png')}}" alt="" height="24">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="fe-menu"></i>
            </button>
        </li>
    </ul>
</div>
<!-- end Topbar -->
