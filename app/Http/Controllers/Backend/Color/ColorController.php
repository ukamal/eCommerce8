<?php

namespace App\Http\Controllers\Backend\Color;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Color;
use Auth;
use App\Http\Requests\ColorRequest;

class ColorController extends Controller
{
    public function view(){
        $data['allData'] = Color::all();
        return view('backend.color.view_color',$data);
    }

    public function add(){
        return view('backend.color.add_color');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:colors,name,'
        ]);
        $data = new Color();
        $data->name = $request->name;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('view-color')->with('success','Data inserted successfully!');
    }

    public function edit($id){
        $data['editData'] = Color::find($id);
        return view('backend.color.add_color',$data);
    }

    public function update(ColorRequest $request, $id){
        $data = Color::find($id);
        $data->name = $request->name;
        $data->updated_by = Auth::user()->id;
        $data->update();
        return redirect()->route('view-color')->with('success','Data Updated successfully!');
    }

    public function delete(Request $request){ 
        $data = Color::find($request->id);
        $data->delete();
        return redirect()->route('view-color')->with('success','Data deleted successfully!');
    }
    
}
