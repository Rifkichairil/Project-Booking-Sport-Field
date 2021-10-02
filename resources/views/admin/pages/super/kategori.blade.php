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
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Index</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                            <li class="breadcrumb-item active">Kategori Lapangan</li>
                        </ol>
                    </div>
                <h4 class="page-title">Kategori Lapangan</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                    <form action="{{route('core.super.category.store')}}" method="POST" enctype="multipart/form-data">
                                            {!! csrf_field() !!}

                                            <div class="form-group mb-3">
                                                <label for="example-password">Kategori Lapangan</label>
                                                <input class="form-control" type="text" name="name" id="name" placeholder="Kategori Lapangan" value="">
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
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>Kategori Lapangan</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tbody>
                                                        @foreach ($category as $cate)
                                                        <tr>
                                                            <td>{{$cate->name}}</td>
                                                        </tr>
                                                        @endforeach

                                                    </tbody>
                                                </tbody>
                                            </table>
                                        </div> <!-- end table-responsive-->
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row-->
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div><!-- end col -->
                </div>
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
