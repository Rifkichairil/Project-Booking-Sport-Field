@extends('user.app')

@section('style')
<!-- Lightbox css -->
    <!-- Plugins css -->
    <link href="{{asset('bold/assets/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('bold/assets/libs/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />

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
                                <li class="breadcrumb-item active">Pemesanan Lapangan</li>
                            </ol>
                        </div>
                    <h4 class="page-title">Payment </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="col-12">
                        <div class="mt-3 float-right">
                            <p class="m-b-10"><strong>Order Field Name : </strong> <span class="float-right"> &nbsp;&nbsp;&nbsp;&nbsp; {{$orderField->field_name}}</span></p>
                            <p class="m-b-10"><strong>Order Date : </strong> <span class="float-right"> &nbsp;&nbsp;&nbsp;&nbsp; {{$orderField->field_date}}</span></p>
                            {{-- <p class="m-b-10"><strong>Order Status : </strong> <span class="float-right"><span class="badge badge-danger">Unpaid</span></span></p> --}}
                            <p class="m-b-10"><strong>Order Unique : </strong> <span class="float-right">#{{$orderField->unique_code}}</span></p>
                            <p class="m-b-10"><strong>No. Rekening : </strong> <span class="float-right">{{$orderField->no_rek}}</span></p>
                            <p class="m-b-10"><strong>Total Payment : </strong> <span class="float-right">Rp. {{number_format($orderField->total)}}</span></p>
                        </div>
                    </div><!-- end col -->
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-xl-12">
                            {{-- <h4 class="header-title">List Lapangan Anda.</h4> --}}
                            <div class="row">

                                <div class="col-12">

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                <form action="{{route('user.index.payment.store', $orderField->id)}}" method="POST" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h4 class="header-title">Upload Bukti Pembayaran</h4>
                                                                <div class="mt-2 text-center">
                                                                <input type="file" name="image" id="image" class="dropify" data-height="300" accept="image/*" />
                                                            </div> <!-- end card-body-->
                                                        </div> <!-- end card-->

                                                        <div class="form-group mb-3">
                                                            <button type="submit"
                                                                    class="btn btn-success waves-effect waves-light mr-1">Simpan
                                                            </button>
                                                        </div>

                                                    </form>
                                                </div> <!-- end col -->
                                            </div>
                                            <!-- end row-->
                                        </div> <!-- end card-body -->
                                    </div> <!-- end card -->
                                </div><!-- end col -->
                            </div>
                            <!-- end row -->
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div> <!-- end card-box-->
            </div> <!-- end col -->
        </div>
        <!-- end row-->

        </div> <!-- container -->

@endsection

@section('script')
    <!-- Plugins js -->
    <script src="{{asset('bold/assets/libs/jquery-mask-plugin/jquery.mask.min.js')}}"></script>
    <script src="{{asset('bold/assets/libs/autonumeric/autoNumeric-min.js')}}"></script>

    <!-- Init js-->
    <script src="{{asset('bold/assets/js/pages/form-masks.init.js')}}"></script>

    <!-- Plugins js -->
    <script src="{{asset('bold/assets/libs/dropzone/dropzone.min.js')}}"></script>
    <script src="{{asset('bold/assets/libs/dropify/dropify.min.js')}}"></script>

    <!-- Init js-->
    <script src="{{asset('bold/assets/js/pages/form-fileuploads.init.js')}}"></script>


@endsection
