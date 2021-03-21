<?php

namespace App\Http\Controllers\category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\category\Categories;
use DB;
use Session;

class categoryController extends Controller
{
    public function add_category()
    {
        $this->AdminAuthCheck();
        return view('admin.category.add_category');
    }

    public function save_category(Request $request)
    {
        $this->AdminAuthCheck();
        $validatedData = $request->validate([
            'cat_name' => 'required|unique:categories,category_name|max:255',
            'cat_image' => 'required|image|file|mimes:jpeg,png,PNG,jpg,gif,svg|max:2048',
        ]);
        if($files = $request -> file('cat_image'))
        {
            $imagePath = public_path('/images/'); // upload path
            // Upload Orginal Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($imagePath, $profileImage); 

            $category = new Categories();
            $category -> category_name = $request -> cat_name;
            $category -> cat_des = $request -> cat_des;
            $category -> cat_image = "$profileImage";

        }
        try{
            $category->save();
            Session::flash('message','Category Added Successfully!');
            return redirect()->back();
        }
        catch(\Exception $e){
            Session::flash('message','Whoops Category Not Added!');
            return redirect()->back();
        }
    }

    public function manage_category()
    {
        $this->AdminAuthCheck();
        $getData = Categories::orderBy('category_id','DESC')->get();
        return view('admin.category.manage_category',compact('getData'));
    }

    public function delete_category($id)
    {
        $this->AdminAuthCheck();
        $delete_category = Categories::where('category_id',$id)->delete();
        if($delete_category)
        {
            Session::flash('message','Category Deleted Successfully!');
            return redirect()->back();
        }
        else{
            Session::flash('message','Sorry Category Not Deleted!');
            return redirect()->back();
        }


    }
    public function inactive_category($id)
    {
        $this->AdminAuthCheck();
        $category_inactive = DB::table('categories')
              ->where('category_id', $id)
              ->update(['status' => 1]);
        if($category_inactive)
        {
            Session::flash('message','Category Inactive Successfully!');
            return redirect()->back();
        }
        else{
            Session::flash('errorM','Sorry Category Not Inactive!');
            return redirect()->back();
        }
        

    }

    public function active_category($id)
    {
        $this->AdminAuthCheck();
        $category_inactive = DB::table('categories')
              ->where('category_id', $id)
              ->update(['status' => 0]);
        if($category_inactive)
        {
            Session::flash('message','Category Active Successfully!');
            return redirect()->back();
        }
        else{
            Session::flash('errorM','Sorry Category Not Active!');
            return redirect()->back();
        }
        

    }
    public function edit_category($id)
    {
        $this->AdminAuthCheck();
        $category_edit = DB::table('categories')->where('category_id',$id)->get();
        return view('admin.category.edit_category',compact('category_edit'));

    }

    public function update_category(Request $request,$id)
    {
        $this->AdminAuthCheck();
        if($files = $request -> file('cat_image'))
        {
            
            $imagePath = public_path('/images/'); // upload path
            // Upload Orginal Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($imagePath, $profileImage); 

           
            $category = DB::table('categories')
              ->where('category_id',$id)
              ->update(['category_name' => $request->cat_name,
                        'cat_des' => $request->cat_des,
                        'cat_image' => "$profileImage"
              ]);

            Session::flash('message','Category Updated Successfully!');
            return redirect('/category/manage-category');

        }
        else{
            $category = DB::table('categories')
              ->where('category_id',$id)
              ->update(['category_name' => $request->cat_name,
                        'cat_des' => $request->cat_des
              ]);
            if($category){
                Session::flash('message','Category Update Without Image!');
                return redirect('/category/manage-category');
            }
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
