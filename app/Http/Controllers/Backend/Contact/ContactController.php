<?php

namespace App\Http\Controllers\Backend\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Contact;

class ContactController extends Controller
{

        //Customer Information 
    public function contact(){
        $contacts = Contact::orderBy('id','desc')->get();
        return view('backend.contact.contact_info',compact('contacts'));
    }

 
    
    public function deleteConatct($id){
        $customer = Contact::find($id);
        $customer->delete();
        return redirect()->route('view-contact')->with('success','Data deleted successfully');
    }

}
