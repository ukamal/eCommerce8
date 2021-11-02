<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Str;
use App\Models\Backend\Aboutus;
use App\Models\Backend\Logo;
use App\Models\Backend\Slider;
use App\Models\Backend\Social;
use App\Models\Backend\Product;
use App\Models\Backend\Brand;
use App\Models\Backend\ProductColor;
use App\Models\Backend\ProductSize;
use App\Models\Backend\ProductSubImage;
use App\Models\Backend\Contact;
use App\Models\Carousel;
use App\Models\Communicate;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['logo']     = Logo::first();
        $data['contacts'] = Contact::first();
        $data['socials']  = Social::first();
        $data['sliders']  = Slider::all();
        $data['carousels']  = Carousel::all();
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['brands']     = Product::select('brand_id')->groupBy('brand_id')->get();
        $data['products']   = Product::orderBy('id','desc')->paginate(8);
        //dd($data['brands']->toArray());
        return view('frontend.layouts.home',$data);
    }

    public function aboutUs(){
        $data['logo'] = Logo::first();
        $data['socials'] = Social::first();
        return view('frontend.single-pages.about-us',$data);
    }

    public function contactUs(){
        $data['logo'] = Logo::first();
        $data['socials'] = Social::first();
        return view('frontend.single-pages.contact_us',$data);
    }

    public function shoppingCart(){
        $data['logo']     = Logo::first();
        $data['contacts'] = Contact::first();
        $data['socials']  = Social::first();
        return view('frontend.single-pages.shopping_card',$data);
    }

    public function ProductList(){
        $data['logo'] = Logo::first();
        $data['contacts'] = Contact::first();
        $data['socials'] = Social::first();
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['brands']     = Product::select('brand_id')->groupBy('brand_id')->get();
        $data['products']   = Product::orderBy('id','desc')->paginate(8);
        return view('frontend.single-pages.product_list',$data);
    }

    public function categoryWiseProduct($category_id){
        $data['logo'] = Logo::first();
        $data['contacts'] = Contact::first();
        $data['socials'] = Social::first();
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['brands']     = Product::select('brand_id')->groupBy('brand_id')->get();
        $data['products']   = Product::where('category_id',$category_id)->orderBy('id','desc')->get();
        return view('frontend.single-pages.category_wise_product',$data);
    }

    public function brandWiseProduct($brand_id){
        $data['logo'] = Logo::first();
        $data['contacts'] = Contact::first();
        $data['socials'] = Social::first();
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['brands']     = Product::select('brand_id')->groupBy('brand_id')->get();
        $data['products']   = Product::where('brand_id',$brand_id)->orderBy('id','desc')->get();
        return view('frontend.single-pages.brand_wise_product',$data);
    }

    public function productDetails($id, $slug){
        $data['logo'] = Logo::first();
        $data['socials'] = Social::first();
        $data['product']   = Product::where('id',$id)->first();
        $data['product_sub_image'] = ProductSubImage::where('product_id',$data['product']->id)->get();
        $data['product_color'] = ProductColor::where('product_id',$data['product']->id)->get();
        $data['product_size'] = ProductSize::where('product_id',$data['product']->id)->get();
        //dd($data['product_sub_image']->toArray());
        return view('frontend.single-pages.product_detail_info',$data);
    }

    ////////////////////////Search portion /////////////////
    public function search(Request $request){
        $slug = $request->slug;
        $data['product']   = Product::where('slug',$slug)->first();
        if ($data['product']) {
            $data['logo'] = Logo::first();
            $data['socials'] = Social::first();
            $data['product']   = Product::where('slug',$slug)->first();
            $data['product_sub_image'] = ProductSubImage::where('product_id',$data['product']->id)->get();
            $data['product_color'] = ProductColor::where('product_id',$data['product']->id)->get();
            $data['product_size'] = ProductSize::where('product_id',$data['product']->id)->get();
            //dd($data['product_sub_image']->toArray());
            return view('frontend.single-pages.search',$data);
        }else{
            return redirect()->route('search-blank')->with('error','Sorry, we could not find any match.');
        }
      
    }

    public function searchBlank(){
        $data['logo']     = Logo::first();
        $data['contacts'] = Contact::first();
        $data['socials']  = Social::first();
        return view('frontend.single-pages.search_blank',$data);
    }

    public function getProduct(Request $request){
        $slug = $request->slug;
        $productData = DB::table('products')->where('slug','LIKE','%'.$slug.'%')->get();
        $html = '';
        $html .= '<div><ul>';
        if($productData){
            foreach($productData as $v){
                $html .= '<li>'.$v->slug.'</li>';
            }
        }
        $htnl .= '</ul></div>';
        return response()->json($html);
    }

    public function infoStore(Request $request){
          $this->validate($request,[
            'name' => 'required|max:25',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'mobile' => 'required|unique:users,mobile','regex:/(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$/',
            'address' => 'required',
            'message' => 'required',
        ]);
        $contactinfo = new Contact();
        $contactinfo->name = $request->name;
        $contactinfo->email = $request->email;
        $contactinfo->mobile = $request->mobile;
        $contactinfo->address = $request->address;
        $contactinfo->message = $request->message;
        $contactinfo->save();
        return redirect()->back()->with('success','Your comment sent successfully');
    }

}
