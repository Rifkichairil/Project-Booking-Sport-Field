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
                <h4 class="page-title">Update Lapangan</h4>
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
                                                                <input type="file" name="image" id="image" class="dropify" data-height="300" accept="image/*" data-default-file="{{ asset(@$field->image) }}" required />
                                                                <!-- <input type="file" name="image" id="image" class="dropify" data-height="300" accept="image/*"  value="{{ asset(@$field->image) }}" required /> -->
                                                            </div> <!-- end card-body-->
                                                            <span class="font-13 badge badge-danger">Harap diinput kembali foto lapangannya.</span>
                                                            <div class="clearfix"></div>
                                                            <div class="mt-2 text-center">
                                                                <img src="{{ asset(@$field->image) }}" alt="image" class="img-fluid img-thumbnail img-preview" width="200"/>
                                                            </div>

                                                        </div> <!-- end card-->

                                                        <div class="form-group mb-3">
                                                            <label for="simpleinput">Nama Lapangan</label>
                                                            <input class="form-control" type="text" name="field_name" id="field_name" placeholder="Field Name" value="{{@$field->field_name}}" required>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="simpleinput">Kategori Lapangan</label>
                                                            <input class="form-control" type="text" name="field_category" id="field_category" placeholder="Field Kategori" value="{{@$field->field_category}}" required>
                                                            <span class="font-13 text-muted">e.g. "Futsal, Voli, Basket" (Diawali dengan huruf kapital)</span>
                                                        </div>

                                                        {{-- <div class="form-group mb-3">
                                                            <label for="example-select">Katagori Lapangan</label>
                                                            <select class="form-control" id="category_id" name="category_id">
                                                                <option value="none">Tanpa Kategori</option>
                                                                @foreach($fieldCategory ?? '' as $cat)
                                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div> --}}

                                                        <div class="form-group mb-3">
                                                            <label for="example-password">Kode Lapangan</label>
                                                            <input class="form-control" type="text" name="field_code" id="field_code" placeholder="Field Code" value="{{@$field->field_code}}" required>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="example-password">Alamat</label>
                                                            <input class="form-control" type="text" name="field_address" id="field_address" placeholder="Field Address" value="{{@$field->field_address}}" required>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="example-password">No Rekeneing</label>
                                                            <input class="form-control" type="text" name="no_rek" id="no_rek" placeholder="No. Rekening" value="{{@$field->no_rek}}" required>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="example-password">Fasilitas Lapangan</label>
                                                            <input class="form-control" type="text" name="fasilitas" id="fasilitas" placeholder="Fasilitas" value="{{@$field->fasilitas}}" required>
                                                            <span class="font-13 text-muted">Pisahkan dengan tanda koma ( Toilet, Wifi , dll )</span>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label>Harga</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="price">Rp.</span>
                                                                </div>
                                                                <input class="form-control " type="text" name="price" id="price" placeholder="Pricing" value="{{@$field->price}}" required>
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

    <!-- Sweet Alerts js -->
    <script src="{{ asset('bold/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- Magnific Popup-->
        <script src="{{asset('bold/assets/libs/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

    <!-- Gallery Init-->
    <script src="{{asset('bold/assets/js/pages/gallery.init.js')}}"></script>

    <link href="{{asset('bold/assets/libs/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css" />



@endsection
