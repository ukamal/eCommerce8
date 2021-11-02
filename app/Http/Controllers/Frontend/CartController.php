<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Aboutus;
use App\Models\Backend\Logo;
use App\Models\Backend\Slider;
use App\Models\Backend\Contact;
use App\Models\Backend\Social;
use App\Models\Backend\Product;
use App\Models\Backend\Brand;
use App\Models\Backend\ProductColor;
use App\Models\Backend\ProductSize;
use App\Models\Backend\ProductSubImage;
use App\Models\Backend\Color;
use App\Models\Backend\Size;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request){
        $this->validate($request,[
            'size_id' => 'required',
            'color_id' => 'required'
        ]);
        //dd($request->all());
        $product = Product::where('id',$request->id)->first();
        $product_size = Size::where('id',$request->size_id)->first();
        $product_color = Color::where('id',$request->color_id)->first();
        Cart::add([
            'id' => $product->id,
            'qty' => $request->qty,
            'price' => $product->price,
            'name' => $product->name,
            'weight' => 550,
            'options' =>[
                'size_id' => $request->size_id,
                'size_name' => $product_size->name,
                'color_id' => $request->color_id,
                'color_name' => $product_color->name,
                'image' => $product->image
            ],
        ]);
        
        return redirect()->route('show-cart')->with('success','Product added successfully!');
    }

    public function showToCart(){
        $data['logo']     = Logo::first();
        $data['socials']  = Social::first();
        return view('frontend.single-pages.shopping_card',$data);
    }

    public function updateCart(Request $request){
        Cart::update($request->rowId,$request->qty);
        return redirect()->route('show-cart')->with('success','Product updated successfully!');
    }

    public function deleteCart($rowId){
        Cart::remove($rowId);
        return redirect()->route('show-cart')->with('success','Product delete successfully!');
    }

}
