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
use App\Models\User;
use Cart;
use DB;
use Mail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Shipping;
use Auth;
use Session;

class CustomerController extends Controller
{
    public function customerLogin(){
        $data['logo']     = Logo::first();
        $data['socials']  = Social::first();
        return view('frontend.single-pages.customer_login',$data);
    }

    public function customerSignup(){
        $data['logo']     = Logo::first();
        $data['socials']  = Social::first();
        return view('frontend.single-pages.customer_signup',$data);
    }

    public function customerStore(Request $request){
        DB::transaction(function() use($request){
            $this->validate($request,[
                'name' => 'required|max:25',
                'email' => 'required|email|unique:users',
                'mobile' => 'required|unique:users,mobile','regex:/(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$/',
                'password' => 'min:8|required_with:password_confirmation|same:password_confirmation','password_confirmation' => 'min:8',
            ]);

            $code = rand(0000,9999);
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->password = bcrypt($request->password);
            $user->code = $code;
            $user->status = '0';
            $user->usertype = 'customer';
            $user->save();

            $data = array(
                'email' => $request->email,
                'code' => $code,
            );

            Mail::send('frontend.email.verify_email', $data, function($message) use ($data){
                $message->from('flkamal2016@gmail.com','Online shopping');
                $message->to($data['email']);
                $message->subject('Please verify your email address');
            });

        });

        return redirect()->route('email-verify')->with('success','You have successfully signup! Please check your email for verify');
        
    }

    public function emailVerify(){
        $data['logo']     = Logo::first();
        $data['socials']  = Social::first();
        return view('frontend.single-pages.email_verify',$data);
    }

    public function verifyStore(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'code' => 'required',
        ]);

        $checkData = User::where('email',$request->email)->where('code',$request->code)->first();
        if($checkData){
            $checkData->status = '1';
            $checkData->save();
            return redirect()->route('customer-login')->with('success',' Wow! Your registration has been successful!');
        }else{
            return redirect()->back()->with('error','Sorry your verification code wrong');
        }
    }

    //checkout

    public function customerCheckout(){
        $data['logo']     = Logo::first();
        $data['socials']  = Social::first();
        return view('frontend.single-pages.customer_checkout',$data);
    }

    public function customerCheckStore(Request $request){
        $this->validate($request,[
            'name' => 'required|max:25',
            'address' => 'required',
            'mobile_no' => 'required','regex:/(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$/',
        ]);

        $checkout = new Shipping();
        $checkout->user_id = Auth::user()->id;
        $checkout->name = $request->name;
        $checkout->email = $request->email;
        $checkout->mobile_no = $request->mobile_no;
        $checkout->address = $request->address;
        $checkout->save();
        Session::put('shipping_id',$checkout->id);
        return redirect()->route('customer-payment');
    }

}
