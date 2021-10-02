<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                @if (Auth::user()->role_id == 99)
                    <li>
                        <a href="{{route('core.super.index')}}">
                            <i class="fe-airplay"></i>
                            {{-- <span class="badge badge-success badge-pill float-right">4</span> --}}
                            <span> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('core.super.category')}}">
                            <i class="mdi mdi-soccer-field"></i>
                            {{-- <span class="badge badge-success badge-pill float-right">4</span> --}}
                            <span> Category </span>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{route('core.admins.index')}}">
                            <i class="mdi mdi-monitor "></i>
                            {{-- <span class="badge badge-success badge-pill float-right">4</span> --}}
                            <span> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('core.lapangan.index')}}">
                            <i class="mdi mdi-soccer-field"></i>
                            <span> Fields </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('core.pesanan.index')}}">
                            <i class="fe-calendar"></i>
                            <span> Booked </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('core.super.admin.turney')}}">
                            <i class="fe-clipboard "></i>
                            {{-- <span class="badge badge-success badge-pill float-right">4</span> --}}
                            <span> Events </span>
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
