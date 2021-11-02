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

<section class="vh-100 mt-5 mb-5">
  <h1 style="text-align: center">User Login</h1>
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
       
        <div class="col-md-12 mt-5">
          <form class="user" method="POST" action="{{ route('login') }}">
            @csrf

           <div class="row">
               <div class="col-md-6">
                <div class="form-group row">
                    <div class="col-md-4"></div>
                    <div class="col-md-6">
                        <a href="{{ route('facebook') }}" class="btn btn-primary btn-block">Login with Facebook</a>
                    </div>
                 </div>
    
                <div class="form-group row">
                    <div class="col-md-4"></div>
                    <div class="col-md-6">
                        <a href="{{ route('github') }}" class="btn btn-dark btn-block">Login with Github</a>
                    </div>
                 </div>
    
                <div class="form-group row">
                    <div class="col-md-4"></div>
                    <div class="col-md-6">
                        <a href="{{ route('google') }}" class="btn btn-success btn-block">Login with Google</a>
                    </div>
                 </div>
               </div>
           
               <div class="col-md-1 text-center">
                   <p>Or</p>
               </div>

           <div class="col-md-5">
            @if (Session::get('message'))
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>{{Session::get('message')}}</strong>
                </div>
            @endif

            <div class="form-group row">
                <div class="col-md-2"></div>
                <div class="col-md-7">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2"></div>
                <div class="col-md-7">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2"></div>
                <div class="col-md-7">
                    <div class="custom-control custom-checkbox small">
                        <input id="remember" type="checkbox" name="remember" class="custom-control-input" >
                        <label class="custom-control-label" for="remember">Remember Me</label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2"></div>
                <div class="col-md-7">
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Login
            </button>
            <p class="small fw-bold mt-2 pt-1 mb-0"> <i class="fa fa-user"></i> Don't have an account? 
            <a href="{{route('customer-signup')}}" class="link-danger">Register Now</a></p>
                </div>
            </div>
           </div>

           </div>
            </div>
        </form>
          
        </div>
      </div>
    </div>
  </section>


@endsection
