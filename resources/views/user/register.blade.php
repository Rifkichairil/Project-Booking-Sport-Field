<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Register User - Sportcorner</title>
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


        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
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

                                <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group pt-4">
                                        <label for="first_name">First Name</label>
                                        <input class="form-control" type="text" name="first_name" placeholder="first name" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="emailaddress">Last Name</label>
                                        <input class="form-control" type="text" name="last_name" placeholder="last name" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Email</label>
                                        <input class="form-control" type="email" name="email" placeholder="your email" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Phone Number</label>
                                        <input class="form-control" type="tel" name="telp" placeholder="your phone number" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" name="password" placeholder="your password" value="" required>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-success btn-block" type="submit"> Sign Up </button>
                                    </div>

                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-white-50">Already have account?  <a href="{{route('user.login')}}" class="text-white ml-1"><b>Sign In</b></a></p>
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

        <footer class="footer footer-alt">
            2015 - 2019 &copy; UBold theme by <a href="" class="text-white-50">Coderthemes</a>
        </footer>


        <!-- Vendor js -->
        <script src="{{asset('bold/assets/js/vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('bold/assets/js/app.min.js')}}"></script>

    </body>
</html>
