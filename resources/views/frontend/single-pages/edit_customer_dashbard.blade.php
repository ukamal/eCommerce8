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
        <img align="left" id="showImage" class="fb-image-profile thumbnail" src="{{(!empty($users->image))?url('public/upload/user_images/'.$users->image):url('public/upload/no-img.png')}}" alt="Profile image example"/>
    </div>
</div> <!-- /container -->  
<hr>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="customerProfile">
				<ul>
					<li><a href="{{route('customer-dashboard')}}">My Profile</a></li>
					<li><a href="">My Orders</a></li>
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
			<div class="card-body">
        <form action="{{ route('customer-profile-update') }}" method="post" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="name">Name</label>
              <input type="text" name="name" value="{{$editData->name}}" class="form-control">
            </div>
            <div class="form-group col-md-4">
              <label for="email">Email</label>
              <input type="email" name="email" value="{{$editData->email}}" class="form-control">
            </div>
            <div class="form-group col-md-4">
              <label for="mobile">Mobile</label>
              <input type="text" name="mobile" value="{{$editData->mobile}}" class="form-control">
            </div>
            <div class="form-group col-md-4">
              <label for="address">Address</label>
              <input type="text" name="address" value="{{$editData->address}}" class="form-control">
            </div>
            <div class="form-group col-md-4">
              <label for="usertype">Gender</label>
              <select name="gender" id="gender" class="form-control">
                <option value="">Gender</option>
                <option value="Male" {{($editData->gender=="Male")?"selected":""}}>Male</option>
                <option value="Female" {{($editData->gender=="Female")?"selected":""}}>Female</option>
                <option value="3rdGender" {{($editData->gender=="3rd gender")?"selected":""}}>3rd Gender</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="image">Image</label>
              <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="form-group col-md-2">
              <img id="showImage" src="{{(!empty($editData->image))?url('/upload/user_images/'.$editData->image):url('/upload/no-img.png')}}" style="height: 160px;width: 150px;border: 1px solid #000" alt="img">
            </div>
            <div class="form-group col-md-4">
              <input type="submit" class="btn btn-primary btn-lg btn-block" value="Update">
            </div>
          </div>
        </form>
      </div>
		</div>
	</div>
</div>
			

<script>
    $(function () {
      $('#myForm').validate({
        rules: {
          name: {
            required: true,
            name: true,
          },
          email: {
            required: true,
            email: true,
          },
          mobile: {
            required: true,
            mobile: true,
          },
          address: {
            required: true,
            address: true,
          },
          password: {
            required: true,
            minlength: 8
          },
          password2: {
            required: true,
            equalTo: '#password'
          },
        },
        messages: {
          usertype: {
            required: "Please enter a roles",
          },
          name: {
            required: "Please enter a valid name",
          },
          email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address"
          },
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
          },
          terms: "Please accept our terms"
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
    </script>


@endsection
