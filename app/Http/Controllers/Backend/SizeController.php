<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Size;
use Auth;
use App\Http\Requests\SizeRequest;

class SizeController extends Controller
{
    public function view(){
        $data['allData'] = Size::all();
        return view('backend.size.view_size',$data);
    }

    public function add(){
        return view('backend.size.add_size');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:colors,name,'
        ]);
        $data = new Size();
        $data->name = $request->name;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('view-size')->with('success','Data inserted successfully!');
    }

    public function edit($id){
        $data['editData'] = Size::find($id);
        return view('backend.size.add_size',$data);
    }

    public function update(SizeRequest $request, $id){
        $data = Size::find($id);
        $data->name = $request->name;
        $data->updated_by = Auth::user()->id;
        $data->update();
        return redirect()->route('view-size')->with('success','Data Updated successfully!');
    }

    public function delete(Request $request){ 
        $data = Size::find($request->id);
        $data->delete();
        return redirect()->route('view-size')->with('success','Data deleted successfully!');
    }
    
}
