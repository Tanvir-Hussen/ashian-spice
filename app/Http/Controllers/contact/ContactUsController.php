<?php

namespace App\Http\Controllers\contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\contact\ContactUs;
use App\Mail\messageConfirm;
use Session;
use Mail;

class ContactUsController extends Controller
{
    public function contact_us()
    {
        return view('user.contact.contact_us');
    }

    public function save_contact(Request $request){
        $this->validate($request,[
            'contact_firstName' => 'required',
            'contact_email' => 'required|email',
            'contact_subject' => 'required',
            'contact_message' => 'required',
            
        ]);
        $contact = new ContactUs();
        // $category -> category_name = $request -> cat_name;
        // $category -> cat_des = $request -> cat_des;
        $contact->contact_firstName = $request->contact_firstName;
        $contact->contact_email = $request->contact_email;
        $contact->contact_subject = $request->contact_subject;
        $contact->contact_message = $request->contact_message;
        try{
            $contact->save();
            Mail::to('email@gmail.com')->send(new messageConfirm($contact));
            Session::flash('message','Thank You! We Got You Message');
            return redirect()->back();
        }
        catch(\Exception $e){
            Session::flash('error','Ooops! Add Again');
            return redirect()->back();
        }
    }
}
