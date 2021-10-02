@extends('user.app')

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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Profile</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <i class="mdi mdi-check-all mr-2"></i> {{ $message }}
        </div>
        @endif
        {{-- Profile --}}
        <div class="row">
            <div class="col-lg-6 col-xl-6">
                <div class="card-box text-center">

                    <h4 class="mb-0">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h4>
                    <p class="text-muted">@UserSoccercorner</p>

                    <a href="{{route('user.profile.edit', Auth::user()->id)}}" type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Ubah</a>

                    <div class="text-left mt-3">
                
                        <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ml-2">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span></p>

                        <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 ">{{Auth::user()->email}}</span></p>

                        <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ml-2">{{Auth::user()->telp}} </span></p>

                        @if(Auth::user()->is_email == 0)
                            <p class="text-muted mb-1 font-13"><strong>Email Verification :</strong>
                                <span class="badge badge-danger ml-2"> Disable </span>
                            </p>
                                <form action="{{route('user.email')}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-xs mb-2"> Verifikasi Email Disini </button>
                                </form>
                        @else
                            <p class="text-muted mb-1 font-13"><strong>Email Verification :</strong> <span class=" badge badge-success ml-2"> Enable </span></p>
                        @endif
                    </div>
                </div> <!-- end card-box -->
                </div> <!-- end card-box -->
            </div> <!-- end card-box -->


        </div> <!-- container -->
        {{-- End Profile --}}

@endsection

@section('script')

@endsection
