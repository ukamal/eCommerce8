<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Category;
use Auth;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function view(){
        $data['allData'] = Category::all();
        return view('backend.category.view_category',$data);
    }

    public function add(){
        return view('backend.category.add_category');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:categories,name',
        ]);
        $data = new Category();
        $data->name = $request->name;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('view-category')->with('success','Data inserted successfully!');
    }

    public function edit($id){
        $editData = Category::find($id);
        return view('backend.category.add_category',compact('editData'));    
    }

    public function update(CategoryRequest $request, $id){
        $data = Category::find($id);
        $data->name = $request->name;
        $data->updated_by = Auth::user()->id;
        $data->update();
        return redirect()->route('view-category')->with('success','Data updated successfully');
    }

    public function destroy(Request $request){
        $category = Category::find($request->id);
        $category->delete();
        return redirect()->route('view-category')->with('success','Data deleted successfully');
    }


}
