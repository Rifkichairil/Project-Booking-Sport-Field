@extends('admin.app')

@section('style')
<!-- Lightbox css -->
<link href="{{asset('bold/assets/libs/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

        <div class="container-fluid">


        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                <h4 class="page-title">Your Fields</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

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
                                <a href="{{route('core.lapangan.create')}}" class="btn btn-primary waves-effect waves-light"><i class="fe-plus-circle mr-1"></i>
                                    Tambah Lapangan</a>
                            </div>
                        </div><!-- end col-->
                    </div> <!-- end row -->
                </div> <!-- end card-box -->
            </div><!-- end col-->
        </div>

        <!-- Alert yg dulu disini -->
            <!-- @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                <i class="mdi mdi-check-all mr-2"></i> {{ $message }}
            </div>
            @endif -->
        <!-- Tutup Alert disini -->
        
        <div class="row">

            @foreach ($field as $f)
            @if (Auth::user()->id == $f->user_id)
            <div class="col-md-6 col-xl-3">
                <div class="card-box product-box">

                    <div class="product-action">
                        <a href="{{ route('core.lapangan.edit', $f->id) }}" class="btn btn-success btn-xs waves-effect waves-light"><i class="mdi mdi-pencil"></i>Ubah</a>
                        <form action="{{ route('core.lapangan.delete', $f->id) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('Delete')
                            <button type="submit" class="btn btn-xs btn-danger btn-confirm"><i class="fas fa-trash"></i> Hapus </button>
                        </form>
                    </div>

                    <div>
                        <a href="{{ asset($f->image) }}" class="image-popup" >
                            <img src="{{ asset($f->image) }}" alt="product-pic" class="img-fluid " />
                        </a>
                    </div>

                    <div class="product-info">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="font-16 mt-0 sp-line-1"><a href="ecommerce-prduct-detail.html" class="text-dark">{{ $f->field_name }}</a> </h5>
                                <h5 class="mt-0 sp-line-1"> <span class="text-muted">{{$f->field_category}}</span></h5>
                                <h5 class="m-0"> <span class="text-muted">{{ $f->field_code }} </span></h5>
                            </div>
                            {{-- testing --}}

                        </div> <!-- end row -->
                        <div class="col-auto">
                               <h5 class="product-price-tag"> Rp. {{ number_format($f->price) }}</h5>
                        </div>
                    </div> <!-- end product info-->
                </div> <!-- end card-box-->
            </div> <!-- end col-->
            @endif
            @endforeach
        </div> <!-- end row -->



        </div> <!-- container -->

@endsection

@section('script')
<!-- Sweet Alerts js -->
<script src="{{ asset('bold/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- Magnific Popup-->
    <script src="{{asset('bold/assets/libs/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

<!-- Gallery Init-->
<script src="{{asset('bold/assets/js/pages/gallery.init.js')}}"></script>


@endsection
