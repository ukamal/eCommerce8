
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="Otkrnz5SVt4NIXvEeERFdwfgLlXFCvKYWOEJX9SS">

    <title>Welcome Back - Login</title>

    <!-- Fonts -->
    <link href="{{ asset('public/backend/login/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('public/backend/login/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/login/css/style.css') }}" rel="stylesheet">


</head>
<body class="bg-gradient-primary">

        <main>
            
            <div class="container vertical-center">

                <!-- Outer Row -->
                <div class="row justify-content-center">

                    <div class="col-xl-10 col-lg-12 col-md-9">

                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <div class="col-lg-6 d-none d-lg-block bg-login-image" style="
                                     background-image: url('public/backend/login/img.jpg') "></div>
                                    <div class="col-lg-6">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                            </div>
                                                <form class="user" method="POST" action="{{ route('login') }}">
                                                     @csrf

                                                     @if (Session::get('message'))
                                                        <div class="alert alert-danger alert-dismissable">
                                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                            <strong>{{Session::get('message')}}</strong>
                                                        </div>
                                                     @endif

                                                <div class="form-group">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                     <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox small">
                                                        <input id="remember" type="checkbox" name="remember" class="custom-control-input" >
                                                        <label class="custom-control-label" for="remember">Remember Me</label>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                                    Login
                                                </button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </main>

        <!-- Bootstrap core JavaScript-->
<script src="https://simsiyeka.com/fasume/assets/admin/vendor/jquery/jquery.min.js" defer></script>
<script src="https://simsiyeka.com/fasume/assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js" defer></script>

</body>
</html>
