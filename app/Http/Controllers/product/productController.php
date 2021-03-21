<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\product\Products;
use  App\category\Categories;
use Session;
use DB;

class productController extends Controller
{
    public function add_product()
    {
        $this->AdminAuthCheck();
        $category_data = Categories::get();
        return view('admin.product.add_product', compact('category_data', $category_data));
    }

    public function manage_product()
    {
        $this->AdminAuthCheck();
        $getData = Products::get();
        return view('admin.product.manage_product', compact('getData'));
    }

    public function save_product(Request $request)
    {
        $this->AdminAuthCheck();
        $validatedData = $request->validate([
            'cat_id' => 'required',
            'product_des' => 'required',
            'product_long_des' => 'required',
            'product_price' => 'required',
            'product_name' => 'required|unique:categories,category_name|max:255',
            'product_image' => 'required|image|file|mimes:jpeg,png,PNG,jpg,gif,svg|max:2048',
        ]);
        if ($files = $request->file('product_image')) {
            $product = new Products();
            $product->product_name = $request->product_name;
            $product->cat_id = $request->cat_id;
            $product->product_des = $request->product_des;
            $product->product_long_des = $request->product_long_des;
            $product->product_price = $request->product_price;
            // for image
            $imagePath = public_path('/images/'); // upload path
            // Upload Orginal Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($imagePath, $profileImage);
            $product->product_image = "$profileImage";
            
        } 
        
        
        try{
            $product->save();
            Session::flash('message', 'Product Added Successfully!');
            return redirect()->back();
        }
        catch(\Exception $e) {
            Session::flash('message', 'Whoops Product Not Added!');
            return redirect()->back();
        }
    }


    public function inactive_product($id)
    {
        $this->AdminAuthCheck();
        $product_inactive = DB::table('products')
            ->where('product_id', $id)
            ->update(['product_status' => 1]);
        if ($product_inactive) {
            Session::flash('message', 'Product Inactive Successfully!');
            return redirect()->back();
        } else {
            Session::flash('errorM', 'Sorry Product Not Inactive!');
            return redirect()->back();
        }
    }

    public function active_product($id)
    {
        $this->AdminAuthCheck();
        $product_active = DB::table('products')
            ->where('product_id', $id)
            ->update(['product_status' => 0]);
        if ($product_active) {
            Session::flash('message', 'Product Active Successfully!');
            return redirect()->back();
        } else {
            Session::flash('errorM', 'Sorry Product Not Active!');
            return redirect()->back();
        }
    }

    public function edit_product($id)
    {
        $this->AdminAuthCheck();
        $product_info = DB::table('products')
            ->where('product_id', $id)
            ->get();
        return view('admin.product.edit_product', compact('product_info'));
    }

    public function update_product($id, Request $request)
    {
        $this->AdminAuthCheck();
        if ($files = $request->file('product_image')) {

            $imagePath = public_path('/images/'); // upload path
            // Upload Orginal Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($imagePath, $profileImage);


            $category = DB::table('products')
                ->where('product_id', $id)
                ->update([
                    'product_name' => $request->product_name,
                    'product_des' => $request->product_des,
                    'product_long_des' => $request->product_long_des,
                    'prepare_time' => $request->prepare_time,
                    'delivery_time' => $request->delivery_time,
                    'delivery_time' => $request->delivery_time,
                    'product_price' => $request->product_price,
                    'product_image' => "$profileImage"

                ]);

            Session::flash('message', 'Product Updated Successfully!');
            return redirect('/product/manage-product');
        } else {
            $category = DB::table('products')
                ->where('product_id', $id)
                ->update([
                    'product_name' => $request->product_name,
                    'product_des' => $request->product_des,
                    'product_long_des' => $request->product_long_des,
                    'prepare_time' => $request->prepare_time,
                    'delivery_time' => $request->delivery_time,
                    'delivery_time' => $request->delivery_time,
                    'product_price' => $request->product_price

                ]);
            if ($category) {
                Session::flash('message', 'Product Update Without Image!');
                return redirect('/product/manage-product');
            }
        }
    }

    public function AdminAuthCheck()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return;
        } else {
            return redirect('/admin')->send();
        }
    }
}
