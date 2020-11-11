<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cart = Cart::where('customer_id', '=', '1');
        $dt = Carbon::now();
        $user = User::find(1);
        $address = Address::where('user_id', '=', $user->id)->where('default', '=', '1')->get()[0];

        $order = new Order();
        $order->order_id = Order::where('store_id', '=', 1)->count() + 1;
        $order->user_id = 1;
        $order->store_id = 1;
        $order->order_date = $dt;
        $order->exp_date = $dt->addDay(2);

        $order->total_cost = 5000.50;
        $order->recv_address = $address->address;
        $order->recv_name = $address->receiver;
        $order->recv_tel = $address->telephone;
        $order->shipment = 'Kerry';

        $order->save();
    }
}
