@extends('user.app')

@section('style')
<!-- Lightbox css -->
@endsection

@section('content')

        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                        </div>
                    <h4 class="page-title">Invoice</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            {{-- Start Content --}}
                <div class="row">
                    <div class="col-12">
                        <!-- <p class="badge badge-primary">Jika Order Status "Unpaid" maka bukti TF belum di setujui admin.</p> -->

                        <div class="card-box">
                            <!-- Logo & title -->
                            <div class="clearfix">
                                <div class="float-left">
                                    <img src="assets/images/logo-dark.png" alt="" height="20">
                                </div>
                                <div class="float-right">
                                <h4 class="m-0 d-print-none">Invoice {{$orderField->id}}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mt-3">
                                        <h1><b>Hello,  {{Auth::user()->first_name}}</b></h1>
                                    </div>

                                </div><!-- end col -->
                                <div class="col-md-4 offset-md-2">
                                    <div class="mt-3 float-right">
                                            <p class="m-b-10"><strong>Order Date : </strong> <span class="float-right"> &nbsp;&nbsp;&nbsp;&nbsp; {{$orderField->field_date}}</span></p>
                                        @if ($orderField->status == 1)
                                            <p class="m-b-10"><strong>Order Status : </strong> <span class="float-right"><span class="badge badge-success">Paid</span></span></p>
                                        @else
                                            <p class="m-b-10"><strong>Order Status : </strong> <span class="float-right"><span class="badge badge-danger">Unpaid</span></span></p>
                                        @endif
                                            <p class="m-b-10"><strong>Order Unique : </strong> <span class="float-right">#{{$orderField->unique_code}}</span></p>
                                    </div>
                                </div><!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table mt-4 table-centered">
                                            <thead>
                                            <tr>
                                                <th>Field Name</th>
                                                <th>Field Category </th>
                                                <th>Field Code</th>
                                                <th>Price</th>
                                                <th>Play Time</th>
                                                <th>Duration</th>
                                                <th style="width: 10%" class="text-right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td> <b>{{$orderField->field_name}}</b> </td>
                                                <td> <b>{{$orderField->field_category}}</b></td>
                                                <td> <b>{{$orderField->field_code}}</b></td>
                                                <td> <b>Rp. {{number_format($orderField->price)}}</b></td>
                                                <td> <b>{{$orderField->time_start}} - {{$orderField->time_end}}</b></td>
                                                <td> <b>{{$total_time}} Jam</b></td>
                                                <td class="text-right"><b>Rp. {{number_format($orderField->total)}}</b></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive -->
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="clearfix pt-5">
                                        <h6 class="text-muted">Notes:</h6>

                                        <small class="text-muted">
                                            Please bring the invoice to show the Admin.
                                        </small>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-sm-6">
                                    <div class="float-right">
                                        <!-- <p><b>Sub-total: </b> <span class="float-right">Rp. {{number_format($orderField->price)}}</span></p> -->
                                        {{-- <p><b>Discount (10%):</b> <span class="float-right"> &nbsp;&nbsp;&nbsp; Rp. 50000</span></p> --}}
                                        <h3>Rp. {{number_format($orderField->total)}} </h3>
                                    </div>
                                    <div class="clearfix"></div>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="mt-4 mb-1">
                                <div class="text-right d-print-none">
                                    <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer mr-1"></i> Print</a>
                                    {{-- <a href="#" class="btn btn-info waves-effect waves-light">Submit</a> --}}
                                </div>
                            </div>
                        </div> <!-- end card-box -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            {{-- End Content --}}

        </div> <!-- container -->

@endsection

@section('script')

@endsection
