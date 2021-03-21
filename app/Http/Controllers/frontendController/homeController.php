<?php

namespace App\Http\Controllers\frontendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\product\Products;
use  App\category\Categories;
use Session;
use Cart;

class homeController extends Controller
{

    public function all_category()
    {
        $category = Categories::where('status', 0)->get();
        return view('user.all_category', compact('category'));
    }

    public function all_product()
    {
        $product = Products::where('product_status', 0)->paginate(6);
        return view('user.all_products', compact('product'));
    }

    public function index($category_id)
    {
        $products = Products::where('cat_id', $category_id)->where('product_status', 0)->get();
        return view('user.category_wise_product', compact('products', $products));
    }

    public function view_about_product($id)
    {
        $single_product = Products::where('product_id', $id)->get();
        return view('user.single_product_view', compact('single_product'));
    }

    public function show_cart()
    {
        return view('user.cart_page');
    }

    public function add_to_cart(Request $request, $product_id)
    {
        $qty = $request->qty;
        $product = Products::where('product_id', $product_id)->first();

        \Cart::add(array(
            'id' => $product->product_id,
            'name' => $product->product_name,
            'price' => $product->product_price,
            'quantity' => $qty,
            'attributes' => array(
                'image' => $product->product_image,
            )
        ));
        return redirect('/product/show-cart');
    }
}
