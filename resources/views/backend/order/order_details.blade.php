@extends('backend.layouts.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Order Details Info</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Details</li>
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
                                    Order Details Info
                                    <a href="{{ route('approved-order') }}" class="btn btn-primary float-sm-right"> 
                                        <i class="fa fa-list"></i> Approved List</a>
                                </h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <tr>
                                        <td><strong>Billings Info:</strong></td>
                                        <td colspan="2">
                                            <strong>Name:</strong> {{$order['shipping']['name']}},
                                            <strong>Email:</strong> {{$order['shipping']['email']}}, <br>
                                            <strong>Mobile No:</strong> {{$order['shipping']['email']}},
                                            <strong>Address:</strong> {{$order['shipping']['address']}} <br>
                                            <strong>Payment:</strong> 
                                            {{$order['payment']['payent_method']}}
                                            @if($order['payment']['payent_method'] =='Bkash')
                                                (Transaction No: {{$order['payment']['transaction_no']}})
                                            @endif
                                            <strong># Order No: {{$order->order_no}}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Order Details</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Product Name & Image</strong></td>
                                        <td><strong>Color & Size</strong></td>
                                        <td><strong>Quantity & Size</strong></td>
                                    </tr>
                                    @foreach ($order['order_details'] as $details)
                                        <tr>
                                            <td style="display: flex">
                                                <span><img src="{{url('public/upload/product_images/'.$details['product']['image'])}}" 
                                                    alt="product-image" style="width: 200px;height:200px"></span>
                                                 <span style="line-height: 150px">{{$details['product']['name']}}</span>
                                            </td>
                                            <td>
                                                <span>{{$details['color']['name']}}</span>,
                                                <span>{{$details['size']['name']}}</span>
                                            </td>
                                            <td>
                                                <span>
                                                    @php
                                                        $sub_total = $details->quantity*$details['product']['price'];
                                                    @endphp
                                                    {{$details->quantity}} X
                                                    {{$details['product']['price']}} =
                                                    {{$sub_total}}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2" style="text-align: right"><strong>Grand Total:</strong></td>
                                        <td><strong>{{$order->order_total}} /=</strong></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
