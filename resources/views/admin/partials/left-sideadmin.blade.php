<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>
                <li>
                    <a href="{{route('core.admins.index')}}">
                        <i class="mdi mdi-monitor"></i>
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
                        <i class="mdi mdi-inbox-arrow-down"></i>
                        <span> Booked </span>
                    </a>
                </li>
                
            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
