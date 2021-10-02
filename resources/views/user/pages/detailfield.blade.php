@extends('user.app')

@section('style')
<!-- Lightbox css -->
<!-- Plugins css -->
<link href="{{asset('bold/assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('bold/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('bold/assets/libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css" />
{{-- <link href="{{asset('bold/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" /> --}}
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


@endsection

@section('content')

        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Detail Lapangan</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            {{-- Start Content --}}
            <div class="row">
                <div class="col-12">
                    <h1 class="badge badge-danger">Harap Cek Jadwal Lapangan Terlebih Dahulu Sebelum Memesan!</h1>

                    <div class="card-box">
                        <div class="row">
                            <div class="col-xl-5">

                                <div class="tab-content pt-0">
                                    <div class="tab-pane active show" id="product-1-item">
                                        <img src="{{asset($detailField->image)}}" alt="" class="img-fluid mx-auto d-block rounded">
                                    </div>

                                </div>

                                {{-- <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a href="#product-1-item" data-toggle="tab" aria-expanded="false" class="nav-link product-thumb active show">
                                            <img src="{{asset('storage/'.$detailField->image)}}" alt="" class="img-fluid mx-auto d-block rounded">
                                        </a>
                                    </li>
                                </ul> --}}
                            </div> <!-- end col -->
                            <div class="col-xl-7">
                                <div class="pl-xl-3 mt-3 mt-xl-0">


                                        <h3 href="#" class="text-primary">{{ $detailField->field_name }}</h3>

                                        <h4 class="mb-2"> {{$detailField->field_category}}</h4>

                                        <h4>Kode Lapangan : <span class="badge bg-soft-success text-success ">{{$detailField->field_code}}</span></h4>

                                        <h4>Alamat : <span class="mb-1">{{$detailField->field_address}}</span></h4>

                                        <!-- <h4 class="mb-4 mt-4">Nomor Rekening Lapangan : <span class="text-black mr-1 font-24 mb-4"><b>{{$detailField->no_rek}}</b></span></h4> -->
                                        <h4 class="mb-4 mt-4">Harga : <span class="text-black mr-1 font-24 mb-4"><b>Rp. {{number_format($detailField->price)}}</b></span> / jam</h4>
                                        <h4 class="mb-1">Fasilitas : </h4>
                                        <ul>
                                        @foreach(explode(',', $detailField->fasilitas) as $info)
                                           <li> <h5> <b>{{$info}}</b></h5> </li>
                                        @endforeach
                                        </ul>

                                    @if(Auth::guest('auth.user'))
                                        <form  action="{{route('session')}}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" id="id" name="id"  value="{{$detailField->id}}">
                                            <div class="form-group mb-3 mt-3">
                                                <h5>Tanggal</h5>
                                                <input type="text" id="basic-datepicker" autocomplete="off" name="field_date" class="form-control" placeholder="Pilih Tanggal Main" value="{{ Session::has('field_date') ? Session::get('field_date') : null}}" required>
                                            </div>

                                            <h5 class="my-1 mr-3" for="time_start">Jam Mulai</h5>
                                            <input type="text" id="time_start" name="time_start" class="form-control" value="{{ Session::has('time_start') ? Session::get('time_start') : null}}" autocomplete="off">

                                            <h5 class="my-1 mr-3" for="time_end">Jam Selesai</h5>
                                            <input type="text" id="time_end" name="time_end" class="form-control" value="{{ Session::has('time_end') ? Session::get('time_end') : null}}" autocomplete="off">

                                            <div class="col-xl-12 mt-3 ">
                                                <button type="submit" class="btn btn-success waves-effect waves-light float-right ">
                                                    <span class="button"></span>Silahkan Login Terlebih Dahulu
                                                </button>
                                            </div>
                                        </form>
                                     @else
                                        <form  action="{{route('user.storeField', $detailField->id)}}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                            <div class="form-group mb-3 mt-3">
                                                <h5>Tanggal</h5>
                                                {{-- <input type="text" id="calendar" name="field_date" class="form-control" placeholder="Pilih Tanggal Main" value="" required> --}}
                                                <input type="text" id="basic-datepicker" autocomplete="off" name="field_date" class="form-control" placeholder="Pilih Tanggal Main" value="" required>
                                                {{-- <input type="text" id="ss"> --}}
                                            </div>


                                            <h5 class="my-1 mr-3" for="time_start">Jam Mulai</h5>
                                            <input type="text" id="time_start" name="time_start" class="form-control" autocomplete="off">


                                            <h5 class="my-1 mr-3" for="time_end">Jam Selesai</h5>
                                            <input type="text" id="time_end" name="time_end" class="form-control"  autocomplete="off">


                                                @if(auth()->user()->is_email == 0)
                                                <div class="col-xl-12 mt-3 ">
                                                    <a href="{{route('user.profile')}}" class="btn btn-success waves-effect waves-light float-right ">
                                                            <span class="button"></span>Harap Verifikasi Email
                                                        </a>
                                                    </div>
                                                @else
                                                <div class="col-xl-12 mt-3 ">
                                                    <button type="submit" class="btn btn-success waves-effect waves-light float-right ">
                                                        <span class="button"><i class="mdi mdi-cart"></i></span>Booking
                                                    </button>
                                                </div>
                                                @endif
                                        </form>
                                    @endif


                                </div>
                            </div> <!-- end col -->
                        </div><!-- end row -->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div><!-- end row-->
            {{-- End Content --}}

        {{-- Start Content --}}
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="pl-xl-3 mt-3 mt-xl-0">
                                <h3 href="#" class="text-primary">Jadwal Lapangan {{ $detailField->field_name }}</h3>
                                {{-- <h3 href="#" class="text-primary">{{$order_field->field_date}}</h3> --}}
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Jam Mulai</th>
                                        <th>Jam Selesai</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order_paid as $item)
                                            <tr>
                                                @if ($now <= $item->field_date )
                                                    <td>{{$item->field_date}}</td>
                                                    <td>{{$item->time_start}}</td>
                                                    <td>{{$item->time_end}}</td>
                                                    <td><span class="badge bg-soft-success text-success mb-3">Paid</span></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        @foreach ($order_wait as $item)
                                            <tr>
                                                @if ($now <= $item->field_date )
                                                    <td>{{$item->field_date}}</td>
                                                    <td>{{$item->time_start}}</td>
                                                    <td>{{$item->time_end}}</td>
                                                    <td><span class="badge bg-soft-danger text-danger mb-3">Unpaid</span></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- end col -->
                    </div><!-- end row -->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div><!-- end row-->
        {{-- End Content --}}


        </div> <!-- container -->

@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <!-- Plugins js-->
    <script src="{{asset('bold/assets/libs/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('bold/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{asset('bold/assets/libs/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    {{-- <script src="{{asset('bold/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script> --}}

    <!-- Init js-->
    {{-- <script src="{{asset('bold/assets/js/pages/form-pickers.init.js')}}"></script> --}}

    <script type="text/javascript">

        $(function () {
            $('#basic-datepicker').datepicker({
                minDate: new Date(),
                // maxDate: '+30Y',
            });
        });


        $(function() {
            $('#time_start').timepicker({
                timeFormat: 'H:mm ',
                interval: 60,
                minTime: '10:00',
                maxTime: '22:00',

            });
            $('#time_end').timepicker({
                timeFormat: 'H:mm',
                interval: 60,
                minTime: '11:00',
                maxTime: '23:00',
            });
        });


            // $('#time_end').timepicker({
            //     timeFormat: 'H:mm',
            //     interval: 60,
            //     minTime: '10:00',
            //     maxTime: '22:00',

            // });




    </script>




@endsection
