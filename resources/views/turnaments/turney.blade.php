@extends('user.app')

@section('style')
<!-- Lightbox css -->
@endsection

@section('content')


    <div class="container-fluid">
        <div class="row mt-3">
            @foreach ($turney as $turn)
                <div class="col-lg-4">
                    <div class="card-box bg-pattern">
                        <div class="text-center">
                            <img src="{{asset($turn->image)}}" alt="logo" class="avatar-xl mb-3">
                            <h4 class="mb-1 font-20">{{$turn->turney_name}}</h4>
                            <p class="text-muted  font-14">{{$turn->turney_address}}</p>
                        </div>

                        <p class="font-14 text-center">
                            {{$turn->turney_desc}}
                        </p>

                        <div class="text-center">
                            <a href="{{$turn->turney_link}}" class="btn btn-sm btn-light">View more info</a>
                        </div>

                        <div class="row mt-4 text-center">
                            <div class="col-6">
                                <h5 class="font-weight-bold">Fee</h5>
                                <h5 class="font-weight-light">IDR. {{number_format($turn->turney_fee)}}</h5>
                            </div>
                            <div class="col-6">
                                <h5 class=" font-weight-bold ">Registration Date</h5>
                                <h5 class=" font-weight-light ">{{date('l, d M Y', strtotime($turn->turney_open_req))}} </h5>
                            </div>
                        </div>
                    </div> <!-- end card-box -->
                </div><!-- end col -->
            @endforeach
        </div>
        <!-- end row -->
    </div> <!-- container -->

@endsection

@section('script')

@endsection
