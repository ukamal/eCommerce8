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

<section class="vh-100">
  <h1 style="text-align: center">Email verifycation</h1>
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.png" class="img-fluid"
            alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form method="post" action="{{route('verify-store')}}" id="myForm">
              @csrf
            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="email">Email:</label>
              <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Enter a valid email address" />
              <font style="color: red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
            </div>
  
            <!-- Password input -->
            <div class="form-outline mb-3">
              <label class="form-label">Code:</label>
              <input type="test" id="code" name="code" class="form-control form-control-lg" placeholder="Enter password" />
              <font style="color: red">{{($errors->has('code'))?($errors->first('code')):''}}</font>
            </div>
  
            <div class="text-center text-lg-start mt-4 pt-2">
              <input type="submit" class="btn btn-primary btn-lg" 
              style="padding-left: 2.5rem; padding-right: 2.5rem;cursor:pointer" value="submit"></input>
        
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
                email: {
                    required: true,
                    email: true,
                },
                code: {
                    required: true,
                },
            },
            messages: {
                email: {
                    required: "Please enter a email address",
                    email: "Please enter a vaild email address"
                },
                code: {
                    required: "Please enter your verification code",
                    minlength: "Your password must be at least 8 characters long"
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
