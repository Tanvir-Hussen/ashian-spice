<?php

namespace App\Http\Controllers\cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Cart;

class CartController extends Controller
{
    public function remove_item($id)
    {
        Cart::remove($id);

        if (Cart::isEmpty()) {
            return redirect('/');
        }
        Session::flash('message','Item removed from cart successfully!');
        return redirect()->back();
    }
}
