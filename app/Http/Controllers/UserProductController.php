<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserProductController extends Controller
{

    private function parseTimeZone($dt) {
        return Carbon::parse($dt)->timezone('Asia/Bangkok')->toDateTimeString();
    }

    private function findOrder($opt) {
        $order_list = array();
        $orders = DB::table('orders')
                ->where('user_id', '=', Auth::user()->id)
                ->where('status', '=', $opt)->get();

        foreach($orders as $order) {
            $order_detail = DB::table('order_details')
                            ->where('order_id', '=', $order->order_id)
                            ->join('products', 'products.product_id', '=', 'order_details.product_id')
                            ->select('order_details.*', 'product_name')
                            ->get()
                            ->all();

            $order->ordered_at = $this->parseTimeZone($order->ordered_at);
            $order->purchased_at = $this->parseTimeZone($order->purchased_at);
            $order->verified_at = $this->parseTimeZone($order->verified_at);
            $order->deliveried_at = $this->parseTimeZone($order->deliveried_at);
            $order->completed_at = $this->parseTimeZone($order->completed_at);
            $order->cancelled_at = $this->parseTimeZone($order->cancelled_at);

            $store = DB::table('stores')->where("store_id", '=', $order->store_id)->first();
            $odr = (object) array("order" => $order, "store" => $store->store_name, "detail" => $order_detail);

            array_push($order_list, $odr);
        }

        return $order_list;
    }

    public function showUserProduct($opt) {
        $status = ["purchasing", "verifying", "verified", "deliveried", "completed", "cancelled"];

        return in_array($opt, $status) ?
            view('profile.user_product.orders', ["orders" => $this->findOrder($opt), "opt" => $opt]) :
            redirect()->route('profile');
    }
}
