<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function view(){
        $data['allData'] = User::where('usertype','admin')->where('status','1')->get();
        return view('backend.user.view_user',$data);
    }

    public function add(){
        return view('backend.user.add_user');
    }

    public function store(Request $request){
        $data = new User();
        $data->usertype = 'admin';
        $data->rule = $request->rule;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect()->route('view-user')->with('success','Data inserted successfully!');
    }

    public function edit($id){
        $editData = User::find($id);
        return view('backend.user.edit_user',compact('editData'));
    }

    public function update(Request $request, $id){
        $data = User::find($id);
        $data->rule = $request->rule;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->update();
        return redirect()->route('view-user')->with('success','Data updated successfully');
    }

    public function delete($id){
        $delete = User::find($id);
        if(file_exists('public/upload/user_images/' . $deleteData->image) AND ! empty($deleteData->image)){
            unlink('public/upload/user_images/' . $deleteData->image);
        }
        $delete->delete();
        return redirect()->route('view-user')->with('success','Data deleted successfully');
    }

}
