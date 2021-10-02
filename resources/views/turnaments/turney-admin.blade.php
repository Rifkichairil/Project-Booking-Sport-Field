@extends('admin.app')

@section('style')
<!-- Lightbox css -->

        <!-- Plugins css -->
        <link href="{{asset('bold/assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('bold/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('bold/assets/libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('bold/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Plugins css -->
        <link href="{{asset('bold/assets/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('bold/assets/libs/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
<div class="row mt-3">
    <div class="col-12">
        <div class="">
            <div class="row">
                <div class="col-lg-8">
                    <form class="form-inline">
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="text-lg-right mt-3 mt-lg-0">
                        <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Tambah Turnament</button>
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
                        <img src="{{asset($turn->image)}}" alt="logo" class="avatar-xxl mb-3">
                        <h4 class="mb-1 font-20">{{$turn->turney_name}}</h4>
                        <p class="text-muted  font-14">{{$turn->turney_address}}</p>
                    </div>

                    <p class="font-14 text-center text-muted">
                        {{$turn->turney_desc}}
                    </p>

                    <div class="text-center">
                    <a href="{{$turn->turney_link}}" class="btn btn-sm btn-light">View more info</a>
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

{{-- MODAL --}}
<div id="con-close-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">


                <div class="modal-header">
                    <h4 class="modal-title">Tambah Turnament</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>

            <form  action="{{route('core.super.admin.turney.store')}}"  method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mt-3">
                                <label for="image" class="control-label">Image Turnament</label>

                                <input type="file" class="dropify" name="image" data-default-file="image_turnament"  required/>
                                <p class="text-muted text-center mt-2 mb-0">Default File</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="turney_name" class="control-label">Nama Turnament</label>
                                <input type="text" class="form-control" id="turney_name" name="turney_name" placeholder="Nama Turnament" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="turney_address" class="control-label">Alamat</label>
                                <input type="text" class="form-control" id="turney_address" name="turney_address" placeholder="Alamat" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="turney_link" class="control-label">Link</label>
                                <input type="text" class="form-control" id="turney_link" name="turney_link" placeholder="Link" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="turney_fee" class="control-label">Biaya Pendaftaran</label>
                                <input type="text" class="form-control" id="turney_fee" name="turney_fee" placeholder="Biaya Pendaftaran" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Tanggal Pendaftaran</label>
                                <input type="text" id="basic-datepicker" name="turney_open_req" autocomplete="off" class="form-control" placeholder="October 9, 2018" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group no-margin">
                                <label for="turney_desc" class="control-label">Deskripsi Turnament</label>
                                <textarea class="form-control" id="turney_desc" name="turney_desc" placeholder="Write something about yout turnament" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div><!-- /.modal -->


@endsection

@section('script')
    <!-- Plugins js-->
    <script src="{{asset('bold/assets/libs/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('bold/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{asset('bold/assets/libs/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
    <script src="{{asset('bold/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

    <!-- Plugins js -->
    <script src="{{asset('bold/assets/libs/dropzone/dropzone.min.js')}}"></script>
    <script src="{{asset('bold/assets/libs/dropify/dropify.min.js')}}"></script>

    <!-- Init js-->
    <script src="{{asset('bold/assets/js/pages/form-fileuploads.init.js')}}"></script>

    <!-- Init js-->
<script src="{{asset('bold/assets/js/pages/form-pickers.init.js')}}"></script>


@endsection
