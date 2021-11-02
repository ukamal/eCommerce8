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
                                   @if (isset($editData))
                                       Edit Product
                                       @else 
                                       Add Product
                                   @endif
                                    
                                    <a href="{{ route('view-product') }}" class="btn btn-primary float-sm-right"> <i class="fa fa-list"></i> Product List</a>
                                </h3>
                            </div>
<div class="card-body">
    <table id="example1" class="table table-bordered table-hover">
        <form action="{{(@$editData)?route('update-product',$editData->id) : route('store-product')}}" method="post" id="myForm" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">Category Name</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{(@$editData->category_id==$category->id)?"selected" : ""}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="brand">Brand Name</label>
                    <select name="brand_id" id="brand_id" class="form-control">
                        <option value="">Select Brand</option>
                        @foreach ($brands as $brand)
                            <option value="{{$brand->id}}" {{(@$editData->brand_id==$brand->id)?"selected":""}}>{{$brand->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="name">Product Name <font style="color:red">*</font> </label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ @$editData->name }}">
                    <font style="color:red">{{($errors->has('name'))?($errors->first('name')) : ''}}</font>
                </div>

                <div class="form-group col-md-6">
                    <label for="color">Color Name</label>
                    <select name="color_id[]" class="form-control select2" multiple>
                        @foreach ($colors as $color)
                            <option value="{{$color->id}}" {{(@array(['color_id'=>$color->id],$color_array))?"selected" : ""}}>{{$color->name}}</option>
                        @endforeach
                    </select>
                    <font color="red">{{($errors->has('color_id'))? ($errors->first('color_id')) : ''}}</font>
                </div>

                <div class="form-group col-md-6">
                    <label for="color">Size Name</label>
                    <select name="size_id[]" class="form-control select2" multiple>
                        @foreach ($sizes as $size)
                            <option value="{{$size->id}}" {{(@array(['size_id'=>$size->id],$size_array))? "selected" : ""}}>{{$size->name}}</option>
                        @endforeach
                    </select>
                    <font color="red">{{($errors->has('size_id'))? ($errors->first('size_id')) : ''}}</font>
                </div>
                
                <div class="form-group col-md-12">
                    <label for="">Short Description</label>
                    <textarea name="short_desc" class="form-control">
                        {{(@$editData->short_desc)}}
                    </textarea>
                    <font color="red">{{($errors->has('short_desc'))? ($errors->first('short_desc')) : ''}}</font>
                </div>
                <div class="form-group col-md-12">
                    <label for="">Long Description</label>
                    <textarea name="long_desc" class="form-control" rows="4">
                        {{(@$editData->long_desc)}}
                    </textarea>
                    <font color="red">{{($errors->has('long_desc'))? ($errors->first('long_desc')) : ''}}</font>
                </div>
                <div class="form-group col-md-3">
                    <label for="">Price</label>
                    <input type="number" name="price" class="form-control" value="{{(@$editData->price)}}">
                    <font color="red">{{($errors->has('price'))? ($errors->first('price')) : ''}}</font>
                </div>
                <div class="form-group col-md-3">
                    <label for="">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <img id="showImage" src="{{(!empty($editData->image))?url('public/upload/product_images/'.$editData->image) : url('public/upload/no-img.png')}}" 
                    alt="product-image" style="width: 100%;height:120px;border:1px solid #000">
                </div>
                <div class="form-group col-md-3">
                    <label for="">Sub Image</label>
                    <input type="file" name="sub_image[]" class="form-control" multiple>
                </div>
                <div class="form-group col-md-12">
                    <button class="btn btn-primary form control">{{(@$editData)?"Update" : "Submit"}}</button>
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

 <script>
      $(function () {
          $('#myForm').validate({
              rules: {
                  category_id: {
                      required: true,
                      category_id: true,
                  },
                  brand_id: {
                      required: true,
                      brand_id: true,
                  },
                  name: {
                      required: true,
                  },
                  color_id: {
                      required: true,
                  },
                  size_id: {
                      required: true,
                  },
                  short_desc: {
                      required: true,
                  },
                  long_desc: {
                      required: true,
                  },
                  price: {
                      required: true,
                  },
                  image: {
                      required: true,
                  },
              },
              messages: {
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
