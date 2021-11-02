<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Logo;
use App\Models\Backend\Slider;
use App\Models\Backend\Contact;
use App\Models\Backend\Social;
use App\Models\Backend\Product;
use App\Models\Backend\Brand;
use App\Models\Backend\ProductColor;
use App\Models\Backend\ProductSize;
use App\Models\Backend\ProductSubImage;
use App\Models\User;
use Auth;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Shipping;
use Session;
use DB;
use Cart;

class CustomerDashboardController extends Controller
{
    public function customerDashboard(){
        $data['logo']    = Logo::first();
        $data['socials'] = Social::first();
        $data['users'] = Auth::User();
        //dd($data['users']->toArray());
        return view('frontend.single-pages.customer_dashbard',$data);
    }

    public function editCusDash(){
        $data['logo']    = Logo::first();
        $data['socials'] = Social::first();
        $data['editData'] = Auth::User();
        //dd($data['users']->toArray());
        return view('frontend.single-pages.edit_customer_dashbard',$data);
    }

    public function customreUpdate(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name     = $request->name;
        $data->email    = $request->email;
        $data->mobile   = $request->mobile;
        $data->address  = $request->address;
        $data->gender   = $request->gender;
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('/upload/user_images/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/upload/user_images'),$filename);
            $data['image']= $filename;
        }
        $data->save();

        return redirect()->route('customer-dashboard')->with('success','Profile updated successfully!');
    }

    public function editPass(){
        $data['logo']    = Logo::first();
        $data['socials'] = Social::first();
        return view('frontend.single-pages.edit_customer_password',$data);
    }

    public function customerPasswordUpdate(Request $request){
       //dd($request->toArray());
       if (Auth::attempt(['id'=>Auth::user()->id,'password'=>$request->current_password])) {
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->route('customer-dashboard')->with('success','Password change successfully!');
        }else{
            //dd('ok');
            return redirect()->back()->with('error','Your current password dotch not match ');
        }

    }

    public function payment(){
        $data['logo']    = Logo::first();
        $data['socials'] = Social::first();
        return view('frontend.single-pages.customer_payment',$data);
    }

    public function paymentStore(Request $request){
        // if($request->product_id==NULL){
        //     return redirect()->back()->with('message','Please add product');
        // }else{
            $this->validate($request,[
                'payent_method' => 'required',
            ]);
            if($request->payent_method=='Bkash' && $request->transaction_no ==NULL){
                return redirect()->back()->with('message','Please enter your transaction no');
            }
            DB::transaction(function() use ($request){
                $payment = new Payment();
                $payment->payent_method = $request->payent_method;
                $payment->transaction_no = $request->transaction_no;
                $payment->save();
                $order = new Order();
                $order->user_id = Auth::user()->id;
                $order->shipping_id = Session::get('shipping_id');
                $order->payment_id = $payment->id;
                $order_data = Order::orderBy('id','desc')->first();
                if ($order_data == NULL) {
                    $firstReg = '0';
                    $order_no = $firstReg+1;
                }else{
                    $order_data = Order::orderBy('id','desc')->first()->order_no;
                    $order_no = $order_data+1;
                }
                $order->order_no = $order_no;
                $order->order_total = $request->order_total;
                $order->stutas = '0';
                $order->save();
    
                $contents = Cart::content();
                    foreach ($contents as $content) {
                        $order_datails = new OrderDetail();
                        $order_datails->order_id = $order->id;
                        $order_datails->product_id = $content->id;
                        $order_datails->color_id = $content->options->color_id;
                        $order_datails->size_id = $content->options->size_id;
                        $order_datails->quantity = $content->qty;
                        $order_datails->save();
                    }
            });
        // }
        Cart::destroy();
        return redirect()->route('cus-order-list')->with('success','Data saved successfully!');
    }

    public function cusOrderList(){
        $data['logo']    = Logo::first();
        $data['socials'] = Social::first();
        $data['orders'] = Order::where('user_id',Auth::user()->id)->get();
        return view('frontend.single-pages.customer_orders',$data);
    }

    public function orderDetails($id){
        $orderData = Order::find($id);
        $data['order'] = Order::where('id', $orderData->id)->where('user_id',Auth::user()->id)->first();
        if($data['order']==false){
            return redirect()->back()->with('error','Dont try over smart');
        }else{
            $data['logo']    = Logo::first();
            $data['socials'] = Social::first();
            $data['order'] = Order::with(['order_details'])->where('id', $orderData->id)->where('user_id',Auth::user()->id)->first();
            //dd($data['order']->toArray());
            return view('frontend.single-pages.cust_order_details',$data);
        }
       
    }

    public function orderPrint($id){
        $orderData = Order::find($id);
        $data['order'] = Order::where('id', $orderData->id)->where('user_id',Auth::user()->id)->first();
        if($data['order']==false){
            return redirect()->back()->with('error','Dont try over smart');
        }else{
            $data['logo']    = Logo::first();
            $data['socials'] = Social::first();
            $data['order'] = Order::with(['order_details'])->where('id', $orderData->id)->where('user_id',Auth::user()->id)->first();
            //dd($data['order']->toArray());
            return view('frontend.single-pages.cust_order_print',$data);
        }
    }


    
}
