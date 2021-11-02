<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Social;

class SocialController extends Controller
{
    public function view(){
        $data['countSocial'] = Social::count();
        $data['socials'] = Social::all();
        return view('backend.social.social_view',$data);
    }

    public function add(){
        return view('backend.social.social_add');
    }

    public function store(Request $request){
       $data = new Social();
       $data->address = $request->address;
       $data->mobile = $request->mobile;
       $data->email = $request->email;
       $data->facebook = $request->facebook;
       $data->twitter = $request->twitter;
       $data->youtube = $request->youtube;
       $data->linkedin = $request->linkedin;
       $data->save();

       return redirect()->route('view-social')->with('success','Data inserted successfully!');
    }

    public function delete($id){
        $data = Social::find($id);
        $data->delete();
        return redirect()->route('view-social')->with('success','Data deleted successfully!');
    }

}
