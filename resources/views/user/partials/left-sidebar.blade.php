<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">
                @if (Auth::guest('auth.user'))
                    <li class="menu-title">Navigasi</li>
                    <li>
                        <a href="{{route('user.index')}}">
                            <i class="fe-airplay"></i>
                            {{-- <span class="badge badge-success badge-pill float-right">4</span> --}}
                            <span> Home </span>
                        </a>
                    </li>
                     <li>
                        <a href="{{route('turney.index')}}">
                            <i class="fe-clipboard "></i>
                            {{-- <span class="badge badge-success badge-pill float-right">4</span> --}}
                            <span> Events </span>
                        </a>
                    </li>
                @else
                    <li class="menu-title">Navigation</li>
                    <li>
                        <a href="{{route('user.index')}}">
                            <i class="fe-airplay"></i>
                            {{-- <span class="badge badge-success badge-pill float-right">4</span> --}}
                            <span> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('turney.index')}}">
                            <i class="fe-clipboard "></i>
                            {{-- <span class="badge badge-success badge-pill float-right">4</span> --}}
                            <span> Events </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('user.pemesanan')}}">
                            <i class="fe-calendar"></i>
                            {{-- <span class="badge badge-success badge-pill float-right">4</span> --}}
                            <span> Booked </span>
                        </a>
                    </li>
                @endif

            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
