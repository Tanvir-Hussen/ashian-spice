<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;

class adminController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function admin_register(){
        return view('admin.auth.register');
    }

    public function save_admin()
    {
        return "success";
    }

    public function admin_login(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = MD5($request->admin_password) ;
    
        $result = DB::table('admin_users')
                ->where('admin_email',$admin_email)
                ->where('admin_password',$admin_password)
                ->first();
        
        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return redirect('/dashboard');
        }else{
                Session::flash('errorM','Email or Password Not Match!');
                return redirect()->back();
        }
    }

    
    
}
