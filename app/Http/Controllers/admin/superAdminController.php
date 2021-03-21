<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class superAdminController extends Controller
{
    public function index()
    {
        $this->AdminAuthCheck();
        return view('home');
    }
    
    public function admin_logout(){
        Session::flush();
        return redirect('/admin');
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
