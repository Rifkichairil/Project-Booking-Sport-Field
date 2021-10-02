<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login User - Sportcorner</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('bold/assets/images/favicon.ico')}}">

        <!-- App css -->
    <link href="{{asset('bold/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('bold/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('bold/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">

                                <div class="text-center w-75 m-auto">
                                    <a href="index.html">
                                        <span><img src="{{asset('bold/assets/images/logo-dark.png')}}" alt="" height="35"></span>
                                    </a>
                                </div>

                                @if ($message = Session::get('error'))
                                <div class="alert alert-danger" role="alert">
                                    <i class="mdi mdi-block-helper mr-2"></i> {{ $message }}
                                </div>
                                @endif

                                @if ($message = Session::get('success'))
                                <div class="alert alert-success" role="alert">
                                    <i class="mdi mdi-check-all mr-2"></i> {{ $message }}
                                </div>
                                @endif


                                <form action="{{route('user.auth')}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="form-group mb-3 pt-4">
                                        <label for="emailaddress">Email</label>
                                        <input class="form-control" type="email" name="email" placeholder="email" value="" required="">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" name="password" placeholder="password" value="" required="">
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                                    </div>

                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                            <p class="text-white-50">Don't have an account? <a href="{{route('user.register')}}" class="text-white ml-1"><b>Sign Up</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 text-center">
                            <p class="text-white-50">Do you have your own venue?  <a href="{{route('core.register')}}" class="text-white ml-1"><b>Sign up as Admin !</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <!-- Vendor js -->
        <script src="{{asset('bold/assets/js/vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('bold/assets/js/app.min.js')}}"></script>

    </body>
</html>
