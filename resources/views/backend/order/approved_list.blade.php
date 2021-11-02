@extends('backend.layouts.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Approved Order</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Order</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>
                                    Approved Order List
                                </h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th><strong>SL.</strong></th>
                                            <th><strong>Order No</strong></th>
                                            <th><strong>Total Amount</strong></th>
                                            <th><strong>Payment Method</strong></th>
                                            <th><strong>Status</strong></th>
                                            <th><strong>Action</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $key=> $order)
                                            <tr class="{{$order->id}}">
                                                <td># {{$key+1}}</td>
                                                <td># {{$order->order_no}}</td>
                                                <td>{{$order->order_total}}</td>
                                                <td>
                                                    {{$order['payment']['payent_method']}}
                                                    @if($order['payment']['payent_method'] =='Bkash')
                                                        (Transaction No: {{$order['payment']['transaction_no']}})
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($order->stutas=='0')
                                                        <span style="color: red">Unapproved</span>
                                                    @elseif($order->stutas=='1')
                                                        <span style="color: blue">Approved</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('approved-order-details',$order->id)}}" title="Details" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> Details</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
