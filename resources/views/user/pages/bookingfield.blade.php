@extends('user.app')

@section('style')
<!-- Lightbox css -->
<link href="{{asset('bold/assets/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('bold/assets/libs/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

        <div class="container-fluid">


            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                    <h4 class="page-title">Pemesanan Lapangan </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            {{-- Start Content --}}
            <div class="row">
                <div class="col-12">
                    <p class="badge badge-primary">Jika Sudah Melakukan Upload Bukti TF, Kemudian Cek Invoice</p>

                    <div class="card-box">
                        <div class="row">
                            <div class="table-responsive">
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success" role="alert">
                                    <i class="mdi mdi-check-all mr-2"></i> {{ $message }}
                                </div>
                                @endif
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Pemesan</th>
                                        <th>Field Name</th>
                                        <th>Field Category</th>
                                        <th>Time Start</th>
                                        <th>Price</th>
                                        <th>Order Date</th>
                                        <th>Expired Payment</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order as $ord)

                                        @if (Auth::user()->id == $ord->user_id)

                                        <tr>
                                            <td>{{ $ord->user->first_name }} </td>
                                            <td>{{ $ord->field_name }} </td>
                                            <td>{{ $ord->field_category}} </td>
                                            <td>{{ $ord->time_start }}- {{ $ord->time_end }} </td>
                                            <td>Rp. {{ number_format($ord->total )}} </td>
                                            <td>{{ $ord->field_date}} </td>
                                            <td>{{ $ord->expired_order }} </td>

                                            <td>
                                                @if (Carbon\Carbon::now() < $ord->expired_order)
                                                    <a href="{{route('user.index.payment', $ord->id)}}" class="btn btn-xs btn-primary btn-comfirm"><i class="mdi mdi-file-outline mr-1"></i>Upload</a>
                                                @elseif(@$ord->payment->user_id ==  @$ord->user_id)
                                                    Paid
                                                @else
                                                    Unpaid
                                                @endif
                                            </td>
                                            <td>
                                                {{-- <a href="{{route('user.invoice', $ord->id)}}" class="btn btn-xs btn-success btn-comfirm"><i class="mdi mdi-file-outline mr-1"></i>Invoice</a> --}}
                                                <a href="{{route('user.invoice', $ord->id)}}" class="btn btn-xs btn-success btn-comfirm waves-effect waves-light" title="Cek Invoice" data-plugin="tippy" data-tippy-placement="bottom"><i class="mdi mdi-file-outline"></i></a>
                                                @if (!$ord->status == 1)
                                                    <form action="{{route('delete.order', $ord->id)}}" method="post" enctype="multipart/form-data" style="display: inline-block">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-xs btn-danger btn-comfirm waves-effect waves-light" title="Batalkan Pesanan" data-plugin="tippy" data-tippy-placement="top"><i class="mdi mdi-trash-can-outline"></i></button>
                                                    </form>
                                                @endif
                                                {{-- <a href="{{route('user.invoice', $ord->id)}}" class="btn btn-xs btn-danger btn-comfirm waves-effect waves-light" title="Batalkan Pesanan" data-plugin="tippy" data-tippy-placement="top"><i class="mdi mdi-trash-can-outline"></i></a> --}}
                                            </td>
                                        </tr>

                                        @endif

                                        @endforeach
                                    </tbody>
                                </table>
                        </div><!-- end row -->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div><!-- end row-->
            {{-- End Content --}}



        </div> <!-- container -->

@endsection

@section('script')

    <!-- Plugins js -->
    <script src="{{asset('bold/assets/libs/dropzone/dropzone.min.js')}}"></script>
    <script src="{{asset('bold/assets/libs/dropify/dropify.min.js')}}"></script>

    <!-- Init js-->
    <script src="{{asset('bold/assets/js/pages/form-fileuploads.init.js')}}"></script>

      <!-- Tippy js-->
      <script src="{{asset('bold/assets/libs/tippy-js/tippy.all.min.js')}}"></script>

@endsection
