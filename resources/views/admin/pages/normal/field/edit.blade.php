@extends('admin.app')

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
                <h4 class="page-title">Hi ! Admin {{Auth::user()->first_name}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

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
                                            <h4 class="header-title">Edit Lapangan</h4>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <form action="@if(!@$field){{ route('core.lapangan.store') }}@else{{ route('core.lapangan.update', $field->id) }}@endif" method="POST" enctype="multipart/form-data">
                                                        {!! csrf_field() !!}
                                                        @if(@$field)
                                                        {!! method_field('PATCH') !!}
                                                        @endif
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h4 class="header-title">Upload Foto Lapangan</h4>
                                                                <div class="mt-2 text-center">
                                                                <input type="file" name="image" id="image" class="dropify" data-height="300" accept="image/*" />
                                                            </div> <!-- end card-body-->
                                                        </div> <!-- end card-->

                                                        <div class="form-group mb-3">
                                                            <label for="simpleinput">Name</label>
                                                            <input class="form-control" type="text" name="field_name" id="field_name" placeholder="Field Name" value="{{@$field->field_name}}">
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="example-select">Katagori Lapangan</label>
                                                            <select class="form-control" id="category" name="category">
                                                                <option value="none">Tanpa Kategori</option>
                                                                @foreach($category as $cat)
                                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="example-password">Kode Lapangan</label>
                                                            <input class="form-control" type="text" name="field_code" id="field_code" placeholder="Field Code" value="{{@$field->field_code}}">
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label>Static</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="price">Rp.</span>
                                                                </div>
                                                                <input class="form-control " type="text" name="price" id="price" placeholder="Pricing" value="{{@$field->price}}" >
                                                            </div>
                                                            <span class="font-13 text-muted">e.g. "50,000"</span>
                                                        </div>

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
