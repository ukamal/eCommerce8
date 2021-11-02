@extends('frontend.layouts.master')
@section('content')

<style>
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }
    .h-custom {
        height: calc(100% - 73px);
    }

    @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
    }
</style>

<section class="vh-100 mt-5">
  <h1 style="text-align: center">User Registration</h1>
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-12 mt-5 mb-5">
          <form action="{{route('customer-store')}}" method="post" id="myForm">
              @csrf

                <div class="row">
                  <div class="col-md-6">
                  <div class="form-group row">
                      <div class="col-md-4"></div>
                      <div class="col-md-6">
                          <a href="{{ route('facebook') }}" class="btn btn-primary btn-block">Signup with Facebook</a>
                      </div>
                    </div>
      
                  <div class="form-group row">
                      <div class="col-md-4"></div>
                      <div class="col-md-6">
                          <a href="{{ route('github') }}" class="btn btn-dark btn-block">Signup with Github</a>
                      </div>
                    </div>
      
                    <div class="form-group row">
                      <div class="col-md-4"></div>
                      <div class="col-md-6">
                          <a href="{{ route('google') }}" class="btn btn-success btn-block">Signup with Google</a>
                      </div>
                    </div>
                  </div>
              
                  <div class="col-md-1 text-center">
                      <p>Or</p>
                  </div>
              
                <div class="col-md-5">
                  <!-- Name input -->
                  <div class="form-group row">
                    <div class="col-md-10">
                      <label class="form-label" for="name">Full Name:</label>
                    <input type="text" id="name" name="name" class="form-control form-control-lg" placeholder="Enter a real name" />
                    <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                    </div>
                  </div>
                  <!-- Email input -->
                  <div class="form-group row">
                    <div class="col-md-10">
                      <label class="form-label" for="email">Email:</label>
                      <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Enter a valid email address" />
                      <font style="color: red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                    </div>
                    
                  </div>

                  <!-- Mobile input -->
                  <div class="form-group row">
                    <div class="col-md-10">
                    <label class="form-label" for="mobile">Mobile No:</label>
                    <input type="mobile" id="mobile" name="mobile" class="form-control form-control-lg" placeholder="Enter a real mobile no" />
                    <font style="color: red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
                  </div>
                  </div>
        
                  <!-- Password input -->
                  <div class="form-group row">
                    <div class="col-md-10">
                    <label class="form-label">Password:</label>
                    <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Enter password" />
                    <font style="color: red">{{($errors->has('password'))?($errors->first('password')):''}}</font>
                  </div>
                  </div>

                  <!-- Confirm Password input -->
                  <div class="form-group row">
                    <div class="col-md-10">
                      <label class="form-label">Confirm Password:</label>
                      <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg" placeholder="Enter Confirm password" />
                      <font style="color: red">{{($errors->has('password_confirmation'))?($errors->first('password_confirmation')):''}}</font>
                  </div>
                  </div>
        
                  <div class="form-group row">
                    <div class="col-md-10">
                    <input type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" 
                    value="user register"></input>
                    <p class="small fw-bold mt-2 pt-1 mb-0"> <i class="fa fa-user"></i> 
                      already registered? <a href="{{route('customer-login')}}" class="link-danger">Login Here</a></p>
                  </div>
                  </div>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </section>


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
                },
                password: {
                    required: true,
                    minlength: 8
                },
                password_confirmation: {
                    required: true,
                    equalTo: '#password'
                },
            },
            messages: {
              name: {
                    required: "Please enter a real full name",
                },
                mobile: {
                    required: "Please enter a valid number",
                },
                email: {
                    required: "Please enter a email address",
                    email: "Please enter a vaild email address"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 8 characters long"
                },
                password_confirmation: {
                    required: 'Please enter password',
                    equalTo: 'Confirm password does not match',
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
