<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserProductController extends Controller
{

    private function showWaitPurchase() {
        $orders = DB::table('orders')
                ->where('user_id', '=', Auth::user()->id)
                ->where('status', '=', 'purchasing')
                ->get();
        $order_list = array();

        foreach($orders as $order) {
            $order_detail = DB::table('order_details')
                            ->where('order_id', '=', $order->order_id)
                            ->join('products', 'products.product_id', '=', 'order_details.product_id')
                            ->select('order_details.*', 'product_name')
                            ->get()
                            ->all();
            $order->order_date = Carbon::parse($order->order_date)->timezone('Asia/Bangkok')->toDateTimeString();
            $order->exp_date = Carbon::parse($order->exp_date)->timezone('Asia/Bangkok')->toDateTimeString();
            $store = DB::table('stores')->where("store_id", '=', $order->store_id)->first();
            $odr = (object) array("order" => $order, "store" => $store->store_name, "detail" => $order_detail);
            array_push($order_list, $odr);
        }

        return view('profile.user_product.wait', [
            "orders" => $order_list
        ]);
    }

    private function showPurchased() {
        return view('profile.user_product.purchased');
    }

    private function showDeliveried() {
        return view('profile.user_product.deliveried');
    }

    private function showHistory() {
        return view('profile.user_product.history');
    }

    public function showUserProduct($opt) {
        $view = null;

        switch ($opt) {
            case "wait":
                $view = $this->showWaitPurchase();
            break;
            case "purchased":
                $view = $this->showPurchased();
            break;
            case "deliveried":
                $view = $this->showDeliveried();
            break;
            case "history":
                $view = $this->showHistory();
            break;
            default:
                $view = redirect()->route('profile');
        }

        return $view;
    }
}
