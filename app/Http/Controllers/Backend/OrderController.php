<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Shipping;

class OrderController extends Controller
{
    public function pendingList(){
        $data['orders'] = Order::where('stutas','0')->get();
        return view('backend.order.pending_list',$data);
    }

    public function approveList(){
        $data['orders'] = Order::where('stutas','1')->get();
        return view('backend.order.approved_list',$data);
    }

    public function approvedOrderDetails($id){
        $data['order'] = Order::find($id);
        return view('backend.order.order_details',$data);
    }

    public function orderApproved(Request $request, $id){
        $order = Order::find($request->id);
        $order->stutas = '1';
        $order->save();
        return redirect()->back()->with('success','Approved successfully');
    }

}
