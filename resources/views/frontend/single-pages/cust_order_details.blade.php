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
    </div>
</div> <!-- /container -->  
<hr>
<div class="container">
	<div class="row">
		<div class="col-md-3">
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
		<div class="col-md-9">
			<table id="example1" class="table table-bordered table-hover text-center">
				<tr>
                    <td>
                        <img src="{{ url('public/upload/logo_image/'.$logo->image)}}" alt="logo" style="width: 100%">
                    </td>
                    <td style="width: 50%">
                        <strong>eCommerce</strong> <br>
                        <span>Mobile No: {{$socials->mobile}}</span> <br>
                        <span>Email:{{$socials->email}}</span> <br>
                        <span>Address:{{$socials->address}}</span>
                    </td>
                    <td style="width: 20%"><strong># Order No: {{$order->order_no}}</strong></td>
                </tr>
				<tr>
					<td><strong>Billings Info:</strong></td>
					<td colspan="2">
						<strong>Name:</strong> {{$order['shipping']['name']}},
						<strong>Email:</strong> {{$order['shipping']['email']}}, <br>
						<strong>Mobile No:</strong> {{$order['shipping']['email']}},
						<strong>Address:</strong> {{$order['shipping']['address']}}
						<strong>Payment:</strong> 
						{{$order['payment']['payent_method']}}
						@if($order['payment']['payent_method'] =='Bkash')
							(Transaction No: {{$order['payment']['transaction_no']}})
						@endif
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
			


@endsection
