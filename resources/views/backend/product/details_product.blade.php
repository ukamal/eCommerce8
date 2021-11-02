@extends('backend.layouts.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Product details info</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">details info</li>
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
                                    Product details info
                                    <a href="{{ route('view-product') }}" class="btn btn-primary float-sm-right"> <i class="fa fa-list"></i>Product List</a>
                                </h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <td style="width: 50%">Category</td>
                                            <td style="width: 50%">{{$product['category']['name']}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">Brand</td>
                                            <td style="width: 50%">{{$product['brand']['name']}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">Product Name</td>
                                            <td style="width: 50%">{{$product->name}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">Price</td>
                                            <td style="width: 50%">{{$product->price}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">short Description</td>
                                            <td style="width: 50%">{{$product->short_desc}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">Long Description</td>
                                            <td style="width: 50%">{{$product->long_desc}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">Image</td>
                                            <td style="width: 50%">
                                                <img src="{{(!empty($product->image))?url('public/upload/product_images/'.$product->image):url('public/upload/no-image.png')}}" 
                                                    alt="product-image" style="width: 200px;height:200px">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">Colors</td>
                                            <td style="width: 50%">
                                                @php
                                                    $colors = App\Models\Backend\ProductColor::where('product_id',$product->id)->get();
                                                @endphp
                                                @foreach ($colors as $color)
                                                    {{$color['color']['name']}},
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">Sizes</td>
                                            <td style="width: 50%">
                                                @php
                                                    $sizes = App\Models\Backend\ProductSize::where('product_id',$product->id)->get();
                                                @endphp
                                                @foreach ($sizes as $size)
                                                    {{$size['size']['name']}},
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">Product Sub Image</td>
                                            <td style="width: 50%">
                                                @php
                                                    $subImage = App\Models\Backend\ProductSubImage::where('product_id',$product->id)->get();
                                                @endphp
                                                @foreach ($subImage as $image)
                                                    <img src="{{url('public/upload/product_images/product_sub_image/'.$image->sub_image)}}" 
                                                    alt="product-image" style="width: 200px;height:200px">
                                                @endforeach
                                            </td>
                                        </tr>
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
