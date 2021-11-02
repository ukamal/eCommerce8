@extends('backend.layouts.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Social</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Social</li>
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
                                    Add Social
                                    <a href="{{ route('view-social') }}" class="btn btn-primary float-sm-right"> <i class="fas fa-list"></i>Social List</a>
                                </h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('store-social') }}" method="post" id="myForm">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="mobile">Mobile</label>
                                            <input type="text" name="mobile" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="facebook">Facebook</label>
                                            <input type="text" name="facebook" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="twitter">Twitter</label>
                                            <input type="text" name="twitter" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="youtube">Youtube</label>
                                            <input type="text" name="youtube" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="linkedin">Linkedin</label>
                                            <input type="text" name="linkedin" class="form-control">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="submit" class="btn btn-primary btn-lg btn-block" value="Submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        $(function () {
            $('#myForm').validate({
                rules: {
                    address: {
                        required: true,
                        usertype: true,
                    },
                    mobile: {
                        required: true,
                        name: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    facebook: {
                        required: true,
                        minlength: 8
                    },
                    twitter: {
                        required: true,
                        equalTo: '#password'
                    },
                    youtube: {
                        required: true,
                        equalTo: '#password'
                    },
                    linkedin: {
                        required: true,
                        equalTo: '#password'
                    },
                },
                messages: {
                    usertype: {
                        required: "Please enter a roles",
                    },
                    mobile: {
                        required: "Please enter a valid name",
                    },
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a vaild email address"
                    },
                    facebook: {
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
