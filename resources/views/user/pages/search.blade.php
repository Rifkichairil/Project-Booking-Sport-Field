@extends('user.app')

@section('style')
<!-- Lightbox css -->
@endsection

@section('content')

        <div class="container-fluid">


            <!-- start page title -->
            <div class="row">
                <div class="col-lg-12 mt-5">
                    <div class="search-result-box m-t-30 card-box">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="pt-3 pb-4">
                                            <div class="text-center">
                                                <h1 class="mb-2">Welcome To Sport Corner</h1>
                                                <h5 class="mb-4"> Find your field right here</h5>
                                    </div>
                                    <form class="input-group m-t-10" role="search" action="{{route('search')}}" method="get">
                                        <input type="text" class="form-control" name="q" type="search" value="" placeholder="Search..." >
                                    <span class="input-group-append">
                                        <button type="submit" class="btn waves-effect waves-light btn-blue"><i class="fa fa-search mr-1"></i> Search </button>
                                    </span>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
            <!-- end page title -->

            
            <!-- end page title -->
            <div class="row">
                @foreach ($field as $f)
                <div class="col-md-6 col-xl-4">
                    <div class="card-box product-box">

                        <div class="product-action">
                            <a href="{{route('user.detailfield', $f->id )}}" class="btn btn-success btn-xs waves-effect waves-light"><i class="mdi mdi-eye"></i> Lihat</a>
                            {{-- <a href="javascript: void(0);" class="btn btn-danger btn-xs waves-effect waves-light"><i class="mdi mdi-close"></i></a> --}}
                        </div>

                        <div>
                            <img src="{{asset($f->image)}}" alt="product-pic" class="img-fluid" />
                        </div>

                        <div class="product-info">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5 class="font-16 mt-0 sp-line-1"><a href="ecommerce-prduct-detail.html" class="text-dark">{{$f->field_name}}</a> </h5>
                                    <div class="text-warning mb-2 font-13">
                                    <span>{{$f->field_code}}</span>
                                    </div>
                                    <h5 class="m-0"> <span class="text-muted">{{$f->field_category}}</span></h5>
                                </div>
                                <div class="col-auto">
                                    <div class="product-price-tag">
                                        Rp. {{number_format($f->price)}}
                                    </div>
                                </div>
                            </div> <!-- end row -->
                        </div> <!-- end product info-->
                    </div> <!-- end card-box-->
                </div>
                @endforeach

            </div>




        </div> <!-- container -->

@endsection

@section('script')

@endsection
