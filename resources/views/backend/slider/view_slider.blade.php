@extends('backend.layouts.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Slider</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Slider</li>
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
                                    Slider List
                                    
                                    <a href="{{ route('add-slider') }}" class="btn btn-primary float-sm-right"> <i class="fa fa-plus-circle"></i> Add Slider</a>
                                    
                                </h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Slider</th>
                                        <th>Short Title</th>
                                        <th>Long Title</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($allData as $key => $slider)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td><img src="{{(!empty($slider->image))?url('public/upload/slider_image/'.$slider->image):url('/upload/no-img.png')}}" height="150px" width="300px" alt="logo"></td>
                                            <td>{{$slider->short_title}}</td>
                                            <td>{{$slider->long_title}}</td>
                                            <td>
                                                <a title="Edit" href="{{ route('edit-slider',$slider->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a title="Delete" id="delete" href="{{ route('destroy-slider',$slider->id)}}" class="btn btn-sm btn-danger">
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
