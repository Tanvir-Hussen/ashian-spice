<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\category\Categories;
use DB;

class pagination extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if ($request->id) {
                $data = Categories::where('category_id', '<', $request->id)->OrderBy('category_id', 'DESC')->limit(3)->get();
            } else {
                $data = Categories::OrderBy('category_id', 'DESC')->limit(3)->get();
            }
        }
        return view('includes.category', compact('data'));
    }
}
