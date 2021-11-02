<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Color;
use App\Models\Backend\Brand;
use App\Models\Backend\Category;
use App\Models\Backend\ProductColor;
use App\Models\Backend\ProductSize;
use App\Models\Backend\ProductSubImage;
use App\Models\Backend\Size;
use Auth;
use DB;
use App\Http\Requests\ProductRequest;
use App\Models\Backend\Product;

class ProductController extends Controller
{
    public function view(){
        $data['allData'] = Product::all();
        return view('backend.product.view_product',$data);
    }

    public function add(){
        $data['categories'] = Category::all();
        $data['brands'] = Brand::all();
        $data['colors'] = Color::all();
        $data['sizes'] = Size::all();
        return view('backend.product.add_product',$data);
    }

    public function store(Request $request){
        DB::transaction(function() use ($request){
            $this->validate($request,[
                'name'          => 'required|unique:products,name,',
                'color_id'      => 'required',
                'size_id'       => 'required',
                'category_id'   => 'required',
                'brand_id'      => 'required',
                'price'         => 'required',
                'short_desc'    => 'required',
                'long_desc'     => 'required',
            ]);
            $product = new Product();
            $product->category_id = $request->category_id;
            $product->brand_id    = $request->brand_id;
            $product->name        = $request->name;
            $product->slug        = str_slug($request->name);
            $product->short_desc  = $request->short_desc;
            $product->long_desc   = $request->long_desc;
            $product->price       = $request->price;
            $img = $request->file('image');
            if($img){
                $imgName = date('YmdHi').$img->getClientOriginalName();
                $img->move('public/upload/product_images/',$imgName);
                $product['image'] = $imgName;
            }
            if($product->save()){
                //product sub image
                $files = $request->sub_image;
                if(!empty($files)){
                    foreach($files as $file){
                        $imgName = date('YmdHi').$file->getClientOriginalName();
                        $file->move('public/upload/product_images/product_sub_image',$imgName);
                        $subimage['sub_image'] = $imgName;

                        $subimage = new ProductSubImage();
                        $subimage->product_id = $product->id;
                        $subimage->sub_image = $imgName;
                        $subimage->save();
                    }
                }
                //color table data insert
                $colors = $request->color_id;
                if(!empty($colors)){
                    foreach($colors as $color){
                        $mycolor = new ProductColor();
                        $mycolor->product_id = $product->id;
                        $mycolor->color_id = $color;
                        $mycolor->save();
                    }
                }
                //Size table data insert
                $sizes = $request->size_id;
                if(!empty($sizes)){
                    foreach($sizes as $size){
                        $mysize = new ProductSize();
                        $mysize->product_id = $product->id;
                        $mysize->size_id = $size;
                        $mysize->save();
                    }
                }
            }else{
                return redirect()->back()->with('error','Sorry! Data not saved');
            }
        });
        
        return redirect()->route('view-product')->with('success','Data inserted successfully!');
    }

    public function edit($id){
        $data['editData'] = Product::find($id);
        $data['categories'] = Category::all();
        $data['brands'] = Brand::all();
        $data['colors'] = Color::all();
        $data['sizes'] = Size::all();
        $data['color_array'] = ProductColor::select('color_id')->where('product_id',$data['editData']->id)->orderBy('id','asc')->get()->toArray();
        $data['size_array'] = ProductSize::select('size_id')->where('product_id',$data['editData']->id)->orderBy('id','asc')->get()->toArray();
       
        return view('backend.product.add_product',$data);
    }

    public function update(ProductRequest $request, $id){
        DB::transaction(function() use ($request, $id){
            $this->validate($request,[
                'color_id' => 'required',
                'size_id' => 'required'
            ]);
            $product = Product::find($id);
            $product->category_id = $request->category_id;
            $product->brand_id    = $request->brand_id;
            $product->name        = $request->name;
            $product->slug        = str_slug($request->name);
            $product->short_desc  = $request->short_desc;
            $product->long_desc   = $request->long_desc;
            $product->price       = $request->price;
            $img = $request->file('image');
            if($img){
                $imgName = date('YmdHi').$img->getClientOriginalName();
                $img->move('public/upload/product_images/',$imgName);
                if(file_exists('public/upload/product_images/'.$product->image) AND !empty($product->image)){
                    unlink('public/upload/product_images/'.$product->image);
                }
                $product['image'] = $imgName;
            }
            if($product->save()){
                //product sub image update
                $files = $request->sub_image;
                if(!empty($files)){
                    $subimage = ProductSubImage::where('product_id',$id)->get()->toArray();
                    foreach($subimage as $value){
                        if(!empty($value)){
                            unlink('public/upload/product_images/product_sub_image/'.$value['sub_image']);
                        }
                    } 
                    ProductSubImage::where('product_id',$id)->delete();
                }
                if(!empty($files)){
                    foreach($files as $file){
                        $imgName = date('YmdHi').$file->getClientOriginalName();
                        $file->move('public/upload/product_images/product_sub_image',$imgName);
                        $subimage['sub_image'] = $imgName;

                        $subimage = new ProductSubImage();
                        $subimage->product_id = $product->id;
                        $subimage->sub_image = $imgName;
                        $subimage->save();
                    }
                }
                //color table data updated
                $colors = $request->color_id;
                if(!empty($colors)){
                    ProductColor::where('product_id',$id)->delete();
                }
                if(!empty($colors)){
                    foreach($colors as $color){
                        $mycolor = new ProductColor();
                        $mycolor->product_id = $product->id;
                        $mycolor->color_id = $color;
                        $mycolor->save();
                    }
                }
                //Size table data updated
                $sizes = $request->size_id;
                if(!empty($sizes)){
                    ProductColor::where('product_id',$id)->delete();
                }
                if(!empty($sizes)){
                    foreach($sizes as $size){
                        $mysize = new ProductSize();
                        $mysize->product_id = $product->id;
                        $mysize->size_id = $size;
                        $mysize->save();
                    }
                }
            }else{
                return redirect()->back()->with('error','Sorry! Data not updated');
            }
        });
        
        return redirect()->route('view-product')->with('success','Data Updated successfully!');
    }

    public function delete(Request $request){ 
        $product = Product::find($request->id);
        if(file_exists('public/upload/product_images/'.$product->image) AND ! empty($product->image) ){
            unlink('public/upload/product_images/'.$product->image);
        }
        $subimage = ProductSubImage::where('product_id',$product->id)->get()->toArray();
        if(!empty($subimage)){
            foreach($subimage as $value){
                if(!empty($value)){
                    unlink('public/upload/product_images/product_sub_image/'.$value['sub_image']);
                }
            }
        }
        ProductSubImage::where('product_id',$product->id)->delete();
        ProductColor::where('product_id',$product->id)->delete();
        ProductSize::where('product_id',$product->id)->delete();
        $product->delete();
        
        return redirect()->route('view-product')->with('success','Data deleted successfully!');
    }

    public function details($id){
        $product = Product::find($id);
        return view('backend.product.details_product',compact('product'));
    }
}

