@extends('backend.layouts.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Category</li>
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
                                     @if (isset($editData))
                                        Edit Category
                                    @else 
                                        Add Category
                                    @endif
                                    
                                    <a href="{{ route('view-category') }}" class="btn btn-primary float-sm-right"> <i class="fa fa-list"></i> Category List</a>
                                </h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                <form action="{{ (@$editData)?route('update-category',$editData->id) : route('store-category') }}" method="post" id="myForm">
                                    @csrf 
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="name">Name <font style="color:red">*</font> </label>
                                            <input type="text" name="name" id="name" class="form-control" value="{{ @$editData->name }}" required>
                                            <font style="color:red">{{ ($errors->has('name'))?($errors->first('name')) : '' }}</font>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <button class="btn btn-primary form-control">{{ (@$editData)?"Update" : "Submit" }}</button>
                                        </div>
                                    </div>
                                </form>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>



@endsection
