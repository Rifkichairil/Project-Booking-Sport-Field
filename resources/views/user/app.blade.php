<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Sportcorner</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="aether.id" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('bold/assets/images/favicon.ico') }}">

        @yield('style')

        <!-- App css -->
        <link href="{{ asset('bold/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('bold/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('bold/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('bold/assets/css/custom.css') }}" rel="stylesheet" type="text/css" />

        <!-- Sweet Alert-->
        <link href="{{ asset('bold/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />


        <!-- Plugins css -->
        <link href="{{asset('bold/assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('bold/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('bold/assets/libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('bold/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            @include('sweetalert::alert')

            @include('user.partials.topbar')

            @include('user.partials.left-sidebar')

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        @yield('content')
                        <!-- end page title -->

                    </div> <!-- container -->

                </div> <!-- content -->

                @include('user.partials.footer')

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Vendor js -->
        <script src="{{ asset('bold/assets/js/vendor.min.js') }}"></script>

        @yield('script')

        <!-- App js -->
        <script src="{{ asset('bold/assets/js/app.min.js') }}"></script>
        <script src="{{ asset('bold/assets/js/custom.js') }}"></script>

        <!-- Sweet Alerts js -->
        <script src="{{ asset('bold/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <script>
            @if(session('msg-success'))
            Swal.fire(
                {
                    title: 'Yeay!',
                    text: '{{ session("msg-success") }}',
                    type: 'success',
                    timer: 2000,
                    confirmButtonClass: 'btn btn-confirm mt-2'
                }
            )
            @elseif(session('msg-error'))
            Swal.fire(
                {
                    title: 'Oops!',
                    text: '{{ session("msg-error") }}',
                    type: 'error',
                    timer: 2000,
                    confirmButtonClass: 'btn btn-confirm mt-2'
                }
            )
            @endif
        </script>

        <!-- Laravel Javascript Validation -->
        <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

        {!! @$validator !!}
    </body>
</html>
