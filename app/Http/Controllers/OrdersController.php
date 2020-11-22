<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $sum = Cart::where('user_id','=',Auth::user()->id)->join('products','products.product_id','=','carts.product_id')->select(DB::raw('products.price*carts.qty as total'))->pluck('total')->sum();
        $cart = Cart::where('user_id','=',Auth::user()->id)->join('products','products.product_id','=','carts.product_id')->select('carts.product_id','price','products.*',DB::raw('carts.qty as amount'))->get();
        $addresses = Address::where("user_id", "=", Auth::user()->id)->orderBy("default", "desc")->first();
        $shipment_type = ['Kerry', 'EMS', 'DHL', 'Flash', 'Standard Express'];
        $payment_type = ['COD', 'Transfering'];

//        $shipment_type = DB::table('orders')->select('shipment_type')->get();

        return view("orders.create", [
            'carts' => $cart,
            'address' => $addresses,
            'sum' => $sum,
            'shipment_types' => $shipment_type,
            'payment_types' => $payment_type,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addresses = Address::where("user_id", "=", Auth::user()->id)->orderBy("default", "desc")->first();
        $products = Cart::where('user_id','=',Auth::user()->id)->join('products','products.product_id','=','carts.product_id')
            ->select('products.product_id','products.product_name','products.price','carts.qty','products.store_id')->orderBy('products.store_id')->get();
        $current_store = null;
        $order = null;
        $dateTime = Carbon::now();
        $order_id = null;
        $total = null;
        for($i = 0; $i < $products->count();$i++){
            if($products[$i]->store_id != $current_store){
                $current_store = $products[$i]->store_id;
                $order = new Order();
                $order->user_id = Auth::user()->id;
                $order->store_id = $current_store;
                $order->expired_at = $dateTime->addDays(2);
                $order->total_cost = 0;
                $order->recv_address = $addresses->address;
                $order->recv_name = $addresses->receiver;
                $order->recv_tel = $addresses->telephone;
                $order->shipment_type = 2;
                $order->payment_type = 1;


                $order->save();

                $order_id = DB::table('orders')->max('order_id');
                $total = 0;
            }


            $order_detail = new OrderDetail();
            $order_detail->order_id = $order_id;
            $order_detail->product_id = $products[$i]-> product_id;
            $order_detail->product_name = $products[$i]->product_name;
            $order_detail->qty = $products[$i]->qty;
            $order_detail->price = $products[$i]->price;
            $total = $order_detail->qty * $order_detail->price;
            $order_detail->save();


            DB::table('orders')->where('order_id','=', $order_id)->update(['total_cost'=>$total]);
            $current_store = $products[$i]->store_id;
        }

        return redirect()->route('profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = DB::table('orders')->where('order_id', '=', $id)->first();
        $payment = DB::table('payments')->where('order_id', '=', $id)->first();
        $products = DB::table('order_details')->where('order_id', '=', $id)
                ->join('products', 'products.product_id', '=', 'order_details.product_id')
                ->join('stores', 'stores.store_id', '=', 'products.store_id')
                ->select('order_details.*', 'products.product_img_path', "productS.store_id")
                ->get();

        return view('orders.show', [
            'order' => $order,
            'payment' => $payment,
            '$products' => $products
        ]);
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

        if (!Auth::check()) {
            return redirect()->route('login');
        } else if (Auth::id() != $order->user_id || $order->status != "purchasing") {
            return redirect()->route('profile');
        }

        $products = DB::table('order_details')->where("order_id", "=", $order->order_id)
                ->join("products", "products.product_id", "=", "order_details.product_id")
                ->select("order_details.*", "products.product_img_path")
                ->get();
        return view("orders.inform", [
            "order" => $order,
            "products" => $products,
            "total" => 0
        ]);
    }

    public function storePayment(Request $request, $id) {
        $validation = Validator::make($request->all(), [
            "inpImg" => "required",
            "bank_name" => "required"
        ],
        [
            "inpImg.required" => "กรุณาอัพโหลดหลักฐานการชำระเงิน",
            "bank_name.required" => "กรุณากรอกชื่อธนาคารที่ใช้ในการชำระเงิน"
        ]);

        $pending_payment = Payment::where("order_id", '=', $id)->first();
        $img = $request->file('inpImg');
        if ($img) {
            $path = "storage/pictures/payments/";
            $filename =  $id . "." . $img->getClientOriginalExtension();
            $img->move($path, $filename);

            if ($pending_payment) {
                Payment::where("order_id", '=', $id)->update(['bank_name' => "null", 'img_path' => $path.$filename]);
            } else {
                $pending_payment = new Payment();
                $pending_payment->order_id = $id;
                $pending_payment->bank_name = "";
                $pending_payment->img_path = $path.$filename;
                $pending_payment->save();
            }
        } else if (!$pending_payment) {
            $validation->validate();
        } else{
            if ($request->bank_name == null) {
                return redirect()->back()->with(["oldImgpath" => $pending_payment->img_path]);
            }
        }
        DB::table('payments')->where("order_id", '=', $id)
                ->update([
                    'bank_name' => $request->bank_name
                ]);
        DB::table('orders')->where("order_id", '=', $id)
                ->update([
                    "status" => "verifying"
                ]);

        return redirect()->route("profile");
    }
}

