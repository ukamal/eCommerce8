<?php

namespace App\Http\Controllers\Backend\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Brand;
use Auth;
use App\Http\Requests\BrandRequest;

class BrandController extends Controller
{
    public function view(){
        $data['allData'] = Brand::all();
        return view('backend.brands.view_brand',$data);
    }

    public function add(){
        return view('backend.brands.add_brand');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:brands,name',
        ]);
        $data = new Brand();
        $data->name = $request->name;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('view-brand')->with('success','Data inserted successfully!');
    }

    public function edit($id){
        $editData = Brand::find($id);
        return view('backend.brands.add_brand',compact('editData'));   
    }

    public function update(BrandRequest $request, $id){
        $data = Brand::find($id);
        $data->name = $request->name;
        $data->updated_by = Auth::user()->id;
        $data->update();
        return redirect()->route('view-brand')->with('success','Data updated successfully');
    }

    public function destroy(Request $request){
        $brand = Brand::find($request->id);
        $brand->delete();
        return redirect()->route('view-brand')->with('success','Data deleted successfully');
    }

}
