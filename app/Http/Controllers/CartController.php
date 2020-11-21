<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id','=',Auth::user()->id)->join('products','products.product_id','=','carts.product_id')->select('carts.product_id','product_name','price','carts.qty')->get();

        return view('pages.cart',[
            'carts' => $cart,
        ]);
    }

    public function store(Request $request,$id){
        $cart = Cart::where('user_id', '=', Auth::user()->id)->where('product_id', '=', $id);
        if ($cart->count()==1){
            $count = $cart->get()[0]->qty + $request->input('qty');
            $cart->update([
                'qty'=> $count,
            ]);
            return redirect()->route('cart');
        }
        $cart = new Cart();
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $id;
        $cart->qty = $request->input('qty');
        $cart->save();
        return redirect()->route('cart');
    }
}
