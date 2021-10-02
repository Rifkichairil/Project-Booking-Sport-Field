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
                    <h4 class="page-title">Edit Profile</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        {{-- Profile --}}
        <div class="row">
            <div class="col-lg-6 col-xl-6">
                <div class="card-box text-center">

                    <h4 class="mb-0">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h4>
                    <p class="text-muted">@UserSoccercorner</p>

                    <form action=" {{ route('user.profile.update', Auth::user()->id) }} " method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <button type="submit" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Save</button>

                    <div class="text-left mt-3">

                            <div class="form-group">
                                <label for="first_name">First Name</label>
                            <input class="form-control" type="text" name="first_name" placeholder="first name" value="{{Auth::user()->first_name}}" required>
                            </div>

                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input class="form-control" type="text" name="last_name" placeholder="last name" value="{{Auth::user()->last_name}}" required>
                            </div>

                            <div class="form-group">
                                <label for="edit_email">Email</label>
                                <input class="form-control" type="text" name="edit_email" placeholder="Email" value="{{Auth::user()->email}}" required>
                            </div>

                            <p class="mb-2 font-13"><strong>Mobile :</strong><span class="ml-2">{{Auth::user()->telp}} </span></p>

                            @if(Auth::user()->is_email == 0)
                                <p class="mb-1 font-13"><strong>Email Verification :</strong> <span class="ml-2"> Disable </span></p>
                            @else
                                <p class=" mb-1 font-13"><strong>Email Verification :</strong> <span class="ml-2"> Enable </span></p>
                            @endif
                    </div>
                </form>

                </div> <!-- end card-box -->
                </div> <!-- end card-box -->
            </div> <!-- end card-box -->


        </div> <!-- container -->
        {{-- End Profile --}}

@endsection

@section('script')

@endsection
