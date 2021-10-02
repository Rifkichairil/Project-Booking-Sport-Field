@extends('user.app')

@section('style')
<!-- Lightbox css -->
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">

                <div class="col-lg-8">
                    <form class="form-inline">

                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="text-lg-right mt-3 mt-lg-0">
                        {{-- <button type="button"
                            class="btn btn-success waves-effect waves-light mr-1"><i
                                class="mdi mdi-settings"></i></button> --}}
                        <a href="#" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-plus-circle mr-1"></i>
                            Tambah Lapangan</a>
                    </div>
                </div><!-- end col-->
            </div> <!-- end row -->
        </div> <!-- end card-box -->
    </div><!-- end col-->
</div>

    <div class="container-fluid">
        <div class="row mt-3">
            @foreach ($turney as $turn)
                <div class="col-lg-4">
                    <div class="card-box bg-pattern">
                        <div class="text-center">
                            <img src="assets/images/companies/amazon.png" alt="logo" class="avatar-xl rounded-circle mb-3">
                            <h4 class="mb-1 font-20">{{$turn->turney_name}}.</h4>
                            <p class="text-muted  font-14">{{$turn->turney_address}}</p>
                        </div>

                        <p class="font-14 text-center text-muted">
                            {{$turn->turney_desc}}
                        </p>

                        <div class="text-center">
                            <a href="javascript:void(0);" class="btn btn-sm btn-light">View more info</a>
                        </div>

                        <div class="row mt-4 text-center">
                            <div class="col-6">
                                <h5 class="font-weight-normal text-muted">Fee</h5>
                                <h5>IDR. {{number_format($turn->turney_fee)}}</h5>
                            </div>
                            <div class="col-6">
                                <h5 class="font-weight-normal text-muted">Buka Pendaftaran</h5>
                                <h5>{{date('l, d M Y', strtotime($turn->turney_open_req))}} </h5>
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
