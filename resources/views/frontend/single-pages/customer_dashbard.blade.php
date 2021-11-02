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
		<!-- login with facebook -->
		<img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" style="width:40px;height: auto; float: left;margin-right: 5px;">
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
				<tbody>
					<tr>
					<th scope="col">Name:</th>
					  <td>{{$users->name}}</td>
					</tr>
					<tr>
						<th scope="col">Mobile No:</th>
					  <td>{{$users->mobile}}</td>
					</tr>
					<tr>
						<th scope="col">Email:</th>
						<td>{{$users->email}}</td>
					</tr>
					<tr>
						<th scope="col">Gender:</th>
						<td>{{$users->gender}}</td>
					</tr>
					<tr>
						<th scope="col">Address:</th>
						<td>{{$users->address}}</td>
					</tr>
					<tr>
						<th scope="col">Edit Profile:</th>
						<td>
							<a style="width: 100%" title="Edit" href="{{ route('edit-customer-dashboard',$users->id) }}" class="btn btn-sm btn-primary">
								<i class="fa fa-edit"></i>
							  </a>
						</td>
					</tr>
				  </tbody>
			</table>
		</div>
	</div>
</div>
			


@endsection
