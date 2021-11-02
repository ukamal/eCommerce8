<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carousel;
use Auth;

class CarouselController extends Controller
{
    public function view(){
        $data['carousels'] = Carousel::all();
        return view('backend.carousel.view_carousel',$data);
    }

    public function add(){
        return view('backend.carousel.add_carousel');
    }

    public function store(Request $request){
        $careousel = new Carousel();
        $careousel->short_title = $request->short_title;
        $careousel->long_title = $request->long_title;
        $careousel->created_by = Auth::user()->id;
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/upload/carousel_image'),$filename);
            $careousel['image']= $filename;
        }
        $careousel->save();
        return redirect()->route('view-carousel')->with('success','Carousel inserted successfully!');
    }

    public function edit($id){
        $data['carousel'] = Carousel::find($id);
        return view('backend.carousel.edit_carousel',$data);
    }


     public function update(Request $request, $id)
        {
            $careousel = Carousel::find($id);
            $careousel->short_title = $request->short_title;
            $careousel->long_title = $request->long_title;
            $careousel->updated_by = Auth::user()->id;
            if ($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('/upload/carousel_image/'.$careousel->image));
                $filename =date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('/upload/carousel_image'),$filename);
                $careousel['image']= $filename;
            }
            $careousel->save();
            return redirect()->route('view-carousel')->with('success','Data updated successfully!');
        }


    public function delete($id)
    {
        $allData = Carousel::find($id);
        if(file_exists('/upload/carousel_image/' . $allData->image) AND ! empty($allData->image)){
            @unlink(public_path('/upload/carousel_image/'.$allData->image));
        }
        $allData->delete();
        return redirect()->back()->with('success','Data deleted successfully!');
    }


}
