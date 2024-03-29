@extends('backend.layouts.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Product</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Product</li>
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
                                    Product List
                                    <a href="{{ route('add-product') }}" class="btn btn-primary float-sm-right"> <i class="fa fa-plus-circle"></i> Add Product</a>
                                </h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Category</th>
                                        <th>Brand</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key => $product)
                                            <tr class="{{$product->id}}">
                                                <td>{{$key+1}}</td>
                                                <td>{{$product['category']['name']}}</td>
                                                <td>{{$product['brand']['name']}}</td>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->price}}</td>
                                                <td>
                                                    <img src="{{(!empty($product->image))?url('public/upload/product_images/'.$product->image):url('public/upload/no-image.png')}}" 
                                                    alt="product-image" style="width: 200px;height:200px">
                                                </td>
                                                <td>
                                                    <a title="Details" href="{{ route('details-product',$product->id) }}" class="btn btn-sm btn-success">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a title="Edit" href="{{ route('edit-product',$product->id) }}" class="btn btn-sm btn-primary">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a title="Delete" id="delete" href="{{ route('delete-product',$product->id)}}" class="btn btn-sm btn-danger">
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
