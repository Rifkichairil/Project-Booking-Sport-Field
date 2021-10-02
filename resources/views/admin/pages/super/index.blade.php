@extends('admin.app')

@section('style')
<link href="{{asset('bold/assets/libs/jquery-toast/jquery.toast.min.css')}}" rel="stylesheet" type="text/css" />
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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                            <li class="breadcrumb-item active">Super Admin</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Super Admin</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-xl-12">
                            <h4 class="header-title">List Of Admin</h4>
                            <p class="sub-header">
                                Register For Admin.
                            </p>

                            @if ($message = Session::get('success'))
                            <div class="alert alert-success" role="alert">
                                <i class="mdi mdi-check-all mr-2"></i> {{ $message }}
                            </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Role</th>
                                        <th>Status Account</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tbody>
                                            @foreach ($user as $users)
                                                @if ($users->account == 50)
                                                    <tr>
                                                        <td>{{ $users->first_name }} </td>
                                                        <td>{{ $users->last_name }} </td>
                                                        <td>{{ $users->email }}</td>
                                                        <td>{{ $users->telp }}</td>
                                                        {{-- <td>{{ $users->id }}</td> --}}
                                                        <td>
                                                            @if ($users->role_id == 1)
                                                                admin
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <form action="{{ route('core.super.ustatus', $users->id) }}" method="POST" style="display: inline-block">
                                                                @csrf
                                                                @if($users->status == 0)
                                                                    <button type="submit" class="btn btn-xs btn-danger btn-comfirm">Disable</button>
                                                                @else
                                                                    <button type="submit" class="btn btn-xs btn-success btn-comfirm">Enable</button>
                                                                @endif
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <form action="{{ route('core.super.delete', $users->id) }}" method="POST" style="display: inline-block">
                                                                @csrf
                                                                @method('Delete')
                                                                <button type="submit" class="btn btn-xs btn-danger btn-comfirm">Del</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
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
    <!-- Tost-->
    <script src="{{asset('bold/assets/libs/jquery-toast/jquery.toast.min.js')}}"></script>

    <!-- toastr init js-->
    <script src="{{asset('bold/assets/js/pages/toastr.init.js')}}"></script>


@endsection
