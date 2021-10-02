@extends('admin.app')

@section('style')
<!-- Lightbox css -->
@endsection

@section('content')

        <div class="container-fluid">


        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Index</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                            <li class="breadcrumb-item active">Admin</li>
                        </ol>
                    </div>
                <h4 class="page-title">Hi ! Admin {{Auth::user()->first_name}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-xl-12">
                            <h4 class="header-title">Status Anda Saat Ini.</h4>



                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Status Account</th>
                                        <th>Status Email</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ Auth::user()->first_name }} </td>
                                            <td>{{ Auth::user()->last_name }} </td>
                                            <td>{{ Auth::user()->email }}</td>
                                            <td>{{ Auth::user()->telp }}</td>
                                            <td>
                                                @if(Auth::user()->status == 0)
                                                <button type="" class="btn btn-xs btn-danger btn-comfirm">Inactive</button>
                                                @else
                                                <button type="" class="btn btn-xs btn-success btn-comfirm">Active</button>
                                                @endif
                                            </td>
                                            <td>
                                                @if(Auth::user()->is_email == 0)
                                                <button type="" class="btn btn-xs btn-danger btn-comfirm">Not Verified</button>
                                                @else
                                                <button type="" class="btn btn-xs btn-success btn-comfirm">Verified </button>
                                                @endif
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive-->


                        </div> <!-- end col -->


                    </div> <!-- end row -->
                </div> <!-- end card-box-->
            </div> <!-- end col -->
        </div>
        <!-- end row-->

        </div> <!-- container -->

@endsection

@section('script')

@endsection
