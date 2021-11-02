<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CustomerHandleController extends Controller
{
    public function view(){
        $allData = User::where('usertype','customer')->where('status','1')->get();
        //dd($allData->toArray());
        return view('backend.customers.view_customer',compact('allData'));
    }

    public function pendingCustomer(){
        $allData = User::where('usertype','customer')->where('status','0')->get();
        //dd($allData->toArray());
        return view('backend.customers.pending_customer',compact('allData'));
    }

    public function delete(Request $request){
        $customer = User::find($request->id);
        if(file_exists('/upload/user_images/' . $customer->image) AND ! empty($customer->image)){
            @unlink(public_path('/upload/user_images/'.$customer->image));
        }
        $customer->delete();

        return redirect()->route('pending-customer')->with('success','Data delete successfull!');
    }

}
