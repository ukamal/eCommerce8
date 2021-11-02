<?php

namespace App\Http\Controllers\Backend\Aboutus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Aboutus;
use Auth;

class AboutusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['AboutCount'] = Aboutus::count();
        //dd($data['AboutCount']);
        $data['allData'] = Aboutus::all();
        return view('backend.about.view_about',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('backend.about.add_about');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Aboutus();
        $data->description = $request->description;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('view-aboutus')->with('success','Description added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editData = Aboutus::find($id);
        //dd($editData);
        return view('backend.about.edit_about',compact('editData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateData = Aboutus::find($id);
        $updateData->description = $request->description;
        $updateData->updated_by = Auth::user()->id;
        $updateData->save();
        return redirect()->route('view-aboutus')->with('success','Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData = Aboutus::find($id);
        $deleteData->delete();
        return redirect()->route('view-aboutus')->with('success','Data deleted successfully!');
    }
}
