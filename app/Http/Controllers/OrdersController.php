<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function checkout()
    {

    }

    public function placeOrder(Request $request)
    {
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

    public function saveOrder(Request $request){
        $addresses = Address::where("user_id", "=", Auth::user()->id)->orderBy("default", "desc")->first();
//        $sum = Cart::where('user_id','=',Auth::user()->id)->join('products','products.product_id','=','carts.product_id')
//            ->select(DB::raw('products.price*carts.qty as total'))->pluck('total')->sum();
        $products = Cart::where('user_id','=',Auth::user()->id)->join('products','products.product_id','=','carts.product_id')
            ->select('products.product_id','products.product_name','products.price','carts.qty','products.store_id')->orderBy('products.store_id')->get();
        $current_store = $products[0]->store_id;
        $order = null;
        $dateTime = Carbon::now();
        for($i = 0; $i < $products->count();$i++){
            if($products[$i]->store_id != $current_store){
                $order = new Order();
                $order->user_id = Auth::user()->id;
                $order->store_id = $current_store;
                $order->expired_at = $dateTime->addDays(2);
                $order->total_cost = 0;
                $order->recv_address = $addresses->address;
                $order->recv_name = $addresses->receiver;
                $order->recv_tel = $addresses->telephone;
                $order->shipment_type = $request->get('shipment_type');
                $order->payment_type = $request->get('payment_type');

                $order->save();
            }
            $order_id = DB::table('orders')->max('order_id')+1;
            $total = 0;
            while ($products[$i]->store_id == $current_store){
                $order_detail = new OrderDetail();
                $order_detail->order_id = $order_id;
                $order_detail->product_id = $products[$i]-> product_id;
                $order_detail->product_name = $products[$i]->product_name;
                $order_detail->qty = $products[$i]->qty;
                $order_detail->price = $products[$i]->price;
                $total = $order_detail->qty * $order_detail->price;
                $order_detail->save();
            }
            DB::table('orders')->where('order_id','=', $order_id)->update(['total_cost'=>$total]);
        }

        return redirect()->route('profile');

    }
}


