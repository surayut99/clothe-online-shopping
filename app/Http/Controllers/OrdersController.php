<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function informPayment($id) {
        $order = DB::table('orders')->where("order_id", "=", $id)->first();
        $products = DB::table('order_details')->where("order_id", "=", $order->order_id)
                ->join("products", "products.product_id", "=", "order_details.product_id")
                ->select("order_details.*", "products.product_img_path")
                ->get();
        return view("orders.inform", [
            "order" => $order,
            "products" => $products
        ]);
    }

    // public function checkout(){

    // }

    // public function placeOrder(Request $request) {
    //     $dt = Carbon::now();
    //     $products = Cart::where('user_id', '=', Auth::user()->id)
    //                 ->join('products', 'products.product_id', '=', 'carts.product_id');
    //     $orderDetails = $products->select('carts.product_id', 'store_id', 'carts.qty', 'price')
    //                 ->orderby('store_id')
    //                 ->get();
    //     $stores = $products->select('store_id')->groupBy('store_id')->get();

    //     // add dato to orders table
    //     $recv_addr = Address::where('user_id', '=', Auth::user()->id)->where('default', '=', true)->get();
    //     foreach ($stores as $s) {
    //         $new_id = Order::where('store_id', '=', $s->store_id)->count() + 1;

    //         $order = new Order();
    //         $order->order_id = $new_id;
    //         $order->store_id = $s->store_id;
    //         $order->user_id = Auth::user()->id;
    //         $order->order_date = $dt;
    //         $order->exp_date = $dt->addDay(2);

    //         $order->recv_address = $recv_addr->address;
    //         $order->recv_name = $recv_addr->receiver;
    //         $order->recv_tel = $recv_addr->telephone;

    //         $order->shipment = $request->input($s->store_id + "shipment");
    //         $order->payment_type = $request->input($s->store_id + "payment");

    //         $order->save();
    //     }

    //     // add data to order_datails table
    //     foreach ($orderDetails as $o) {
    //         $detail = new OrderDetail();
    //         $o_id = Order::where('user_id', '=', Auth::user()->id)->where('store_id', '=', $o->store_id)->orderBy('order_date', 'desc')->first();

    //         $detail->order_id = $o_id->order_id;
    //         $detail->product_id = $o->product_id;
    //         $detail->price = $o->price;
    //         $detail->qty = $o->qty;

    //         $detail->save();
    //     }

    //     return redirect()->route('pages.home');
    // }
}
