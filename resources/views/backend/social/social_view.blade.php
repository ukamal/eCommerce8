@extends('backend.layouts.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage social</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">social</li>
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
                           
                            <div class="card-body">
                                <h3>
                                    
                                    Social List
                                  @if ($countSocial < 1)
                                    <a href="{{ route('add-social') }}" class="btn btn-primary float-sm-right"> <i class="fa fa-plus-circle"></i> Add social</a>
                                   @endif
                                </h3>
                                <table id="example1" class="table table-bordered table-hover table-responsive">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Address</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Facebook</th>
                                        <th>Twitter</th>
                                        <th>Youtube</th>
                                        <th>Linkedin</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($socials as $key => $social)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$social->address}}</td>
                                            <td>{{$social->mobile}}</td>
                                            <td>{{$social->email}}</td>
                                            <td>{{$social->facebook}}</td>
                                            <td>{{$social->twitter}}</td>
                                            <td>{{$social->youtube}}</td>
                                            <td>{{$social->linkedin}}</td>
                                            <td>
                                                <a title="Delete" id="delete" href="{{ route('delete-social',$social->id)}}" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
