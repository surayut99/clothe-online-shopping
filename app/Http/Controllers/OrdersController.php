<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function placeOrder(Request $request) {
        $dt = Carbon::now();
        $products = Cart::where('user_id', '=', Auth::user()->id)
                    ->join('products', 'products.product_id', '=', 'carts.product_id');
        $orderDetails = $products->select('carts.product_id', 'store_id', 'carts.qty', 'price')
                    ->orderby('store_id')
                    ->get();
        $stores = $products->select('store_id')->groupBy('store_id')->get();

        // add dato to orders table
        $recv_addr = Address::where('user_id', '=', Auth::user()->id)->where('default', '=', true)->get();
        foreach ($stores as $s) {
            $new_id = Order::where('store_id', '=', $s->store_id)->count() + 1;

            $order = new Order();
            $order->order_id = $new_id;
            $order->store_id = $s->store_id;
            $order->user_id = Auth::user()->id;
            $order->order_date = $dt;
            $order->exp_date = $dt->addDay(2);

            $order->recv_address = $recv_addr->address;
            $order->recv_name = $recv_addr->receiver;
            $order->recv_tel = $recv_addr->telephone;

            $order->shipment = $request->input($s->store_id + "shipment");
            $order->payment_type = $request->input($s->store_id + "payment");

            $order->save();
        }

        // add data to order_datails table
        foreach ($orderDetails as $o) {
            $detail = new OrderDetail();
            $o_id = Order::where('user_id', '=', Auth::user()->id)->where('store_id', '=', $o->store_id)->orderBy('order_date', 'desc')->first();

            $detail->order_id = $o_id->order_id;
            $detail->product_id = $o->product_id;
            $detail->price = $o->price;
            $detail->qty = $o->qty;

            $detail->save();
        }

        return redirect()->route('pages.home');
    }
}
