@extends('frontend.layouts.master')
@section('content')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

<style>

	body
	{
		font-family: 'Open Sans', sans-serif;
	}

	.fb-profile img.fb-image-lg{
		z-index: 0;
		width: 100%;  
		margin-bottom: 10px;
	}

	.fb-image-profile
	{
		margin: -90px 10px 0px 50px;
		z-index: 9;
		width: 20%; 
	}

	.customerProfile ul li {
		background: #000;
		margin: 10px;
		font-size: 16px;
		line-height: 30px;
		padding-left: 10px;
		border-top-right-radius: 50%;
    	border-bottom-right-radius: 50%;
	}

	.customerProfile ul li a {
		color: #fff;
		text-decoration: none;
	}

	.customerProfile ul li a:hover {
		color: blue;
	}

	@media (max-width:768px)
	{
		
	.fb-profile-text>h1{
		font-weight: 700;
		font-size:16px;
	}

	.fb-image-profile
	{
		margin: -45px 10px 0px 25px;
		z-index: 9;
		width: 20%; 
	}
	}
</style>

			
<div class="container">
    <div class="fb-profile">
        <img align="left" class="fb-image-lg" src="http://lorempixel.com/850/280/nightlife/5/" alt="Profile image example"/>
        <img align="left" class="fb-image-profile thumbnail" src="{{(!empty($users->image))?url('public/upload/user_images/'.$users->image):url('public/upload/no-img.png')}}" alt="Profile image example"/>
    </div>
</div> <!-- /container -->  
<hr>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="customerProfile">
				<ul>
					<li><a href="{{route('customer-dashboard')}}">My Profile</a></li>
					<li><a href="{{route('cus-order-list')}}">My Orders</a></li>
					<li><a href="{{route('customer-pass-change')}}">Password Change</a></li>
					<li>
						<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							{{ __('Logout') }}
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-md-8">
			<table id="example1" class="table table-bordered table-hover">
				<thead>
                    <tr>
                        <th><strong>Order No</strong></th>
                        <th><strong>Total Amount</strong></th>
						<th><strong>Payment Method</strong></th>
                        <th><strong>Status</strong></th>
                        <th><strong>Action</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
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
                                <a href="{{route('cust-order-details',$order->id)}}" title="Details" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> Details</a>
                                <a target="_blank" href="{{route('cust-order-print',$order->id)}}" title="Print" class="btn btn-primary btn-sm">
									 <i class="fa fa-print"></i> Print</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
			</table>
		</div>
	</div>
</div>
			


@endsection
