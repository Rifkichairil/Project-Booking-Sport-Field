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
                    <div class="page-title-right">
                    </div>
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
                            {{-- <h4 class="header-title">List Lapangan Anda</h4> --}}
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>User Id</th>
                                            <th>Unique Code</th>
                                            <th>Field Name</th>
                                            <th>Field Code</th>
                                            <th>Play Time</th>
                                            {{-- <th>Price</th> --}}
                                            <th>Total</th>
                                            <th>Payment</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order as $f)
                                        @if (Auth::user()->id == $f->owner_id)
                                    <tr>
                                            <td>{{ $f->user->first_name }} </td>
                                            <td>#{{ $f->unique_code }} </td>
                                            <td>{{ $f->field_name }} </td>
                                            <td>{{ $f->field_code }} </td>
                                            <td>{{ $f->time_start }} - {{ $f->time_end }} </td>
                                            {{-- <td>Rp. {{ number_format($f->price) }} </td> --}}
                                            <td>Rp. {{number_format($f->total)}} </td>
                                            {{-- <td>{{asset($f->payment->image) }} </td> --}}
                                            <td>
                                                <a href="{{asset(@$f->payment->image)}}" class="image-popup" >
                                                    <img src="{{asset(@$f->payment->image)}}" alt="-" class="img-fluid" width="50" />
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('core.pesanan.status', $f->id) }}" method="POST" style="display: inline-block">
                                                    @csrf
                                                    @if($f->status == 0)
                                                        <button type="submit" class="btn btn-xs btn-success btn-comfirm">Setujui Pesanan</button>
                                                    @else
                                                        <button type="submit" class="btn btn-xs  btn-danger btn-comfirm">Tolak Pesanan</button>
                                                    @endif
                                                </form>
                                                {{-- {{$f->status}} --}}
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>

                                </table>
                            </div> <!-- end table-responsive-->
                        </div> <!-- end col -->


                    </div> <!-- end row -->
                </div> <!-- end card-box-->
            </div> <!-- end col -->
        </div>
        <!-- end row-->

        </div> <!-- container -->

        <div class="">
            <select name="" id="">
                <option value=""></option>
                @foreach ($kuesionerkelas as $item)
                    <option value="{{$item->id}}"> {{$item->nama}}</option>
                @endforeach
            </select>
        </div>
@endsection

@section('script')
<!-- Sweet Alerts js -->
<script src="{{ asset('bold/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- Magnific Popup-->
    <script src="{{asset('bold/assets/libs/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

<!-- Gallery Init-->
<script src="{{asset('bold/assets/js/pages/gallery.init.js')}}"></script>

@endsection
