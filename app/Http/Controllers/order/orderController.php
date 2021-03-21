<?php

namespace App\Http\Controllers\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\customer\Customer;
use Session;
use DB;

class orderController extends Controller
{
    public function order_now()
    {
        return view('user.user_info');
    }
    public function manage_order()
    {
        $this->AdminAuthCheck();
        $customer = Customer::get();
        return view('admin.order.manage_order',compact('customer',$customer));
    }
    public function empty_cart()
    {
        Session::flash('message','Sorry Cart Is Empty!');
        return redirect()->back();
    }
    public function view_order($customer_id)
    {
        $this->AdminAuthCheck();
        $order = DB::table('order')->where('customer_id',$customer_id)->get();
        foreach($order as $v_o){}
        $shopping_id = DB::table('shopping_cart')->where('order_id',$v_o->order_id)->get();
        return view('admin.order.view_customer_order_list',compact('shopping_id'));
    }

    public function order_done($id){
        $this->AdminAuthCheck();
        $shopping_cart = DB::table('shopping_cart')
                    ->where('cart_id',$id)
                    ->get();
        foreach($shopping_cart as $item)
        {
            $order_id = $item->order_id;
        }
        $order = DB::table('order')
                    ->where('order_id',$order_id)
                    ->get();
        foreach($order as $item)
        {
            $customer_id = $item->customer_id;
        }
        $order = DB::table('customers')
                 ->where('customer_id',$customer_id)
                 ->update(['status' => 1]);
        
        if($order)
        {
            Session::flash('message','Product Delivered Successfully!');
            return redirect('/order/manage-order');
        }
        else{
            Session::flash('errorM','Sorry Something wrong!');
            return redirect('/order/manage-order');
        }
        
    }

    public function order_delete($id)
    {
        $this->AdminAuthCheck();
        $delete_order = DB::table('order')
                        ->where('order_id',$id)
                        ->delete();
        $delete_customer = DB::table('customers')
                        ->where('customer_id',$id)
                        ->delete();
        $delete_cart = DB::table('shopping_cart')
                        ->where('order_id',$id)
                        ->delete();
        
        if($delete_cart)
        {
            Session::flash('message','Order Deleted Successfully!');
            return redirect('/order/manage-order');
        }
        else{
            Session::flash('errorM','Sorry Something wrong!');
            return redirect('/order/manage-order');
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
