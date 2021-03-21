<?php

namespace App\Http\Controllers\message;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\message\Message;
use Session;

class messageController extends Controller
{
    public function add_message()
    {
        $this->AdminAuthCheck();
        return view('admin.message.add_message');
    }
    public function manage_message()
    {
        $this->AdminAuthCheck();
        $getHeroMessage = Message::get();
        return view('admin.message.manage_message',compact('getHeroMessage'));
    }
    public function save_message(Request $request)
    { 
        $this->AdminAuthCheck();
        $validatedData = $request->validate([
            'message' => 'required',
            ]);
        $heroMessage = new Message();
        $heroMessage->message = $request->message;
        $heroMessage->save();
        if($heroMessage)
        {
            Session::flash('message','Message Added Successfully!');
            return redirect()->back();
        }
        else{
            Session::flash('message','Message Not Added!');
            return redirect()->back();
        }
    }

    public function AdminAuthCheck(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return;
        }
        else{
            return redirect('/admin')->send();
        }
    }
}
