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
        $dt = Carbon::now();
        $user = User::find(1);
        $address = Address::where('user_id', '=', $user->id)->where('default', '=', '1')->get()[0];

        $order = new Order();
        $order->order_id = Order::where('store_id', '=', 1)->count() + 1;
        $order->user_id = 1;
        $order->store_id = 1;
        $order->ordered_at = $dt;
        $order->expired_at = $dt->addDay(2);

        $order->total_cost = 5000.50;
        $order->recv_address = $address->address;
        $order->recv_name = $address->receiver;
        $order->recv_tel = $address->telephone;
        $order->shipment_type = 'Kerry';
<<<<<<< HEAD
=======
        // $order->payment_type = 'COD';
>>>>>>> 455e7f5485fba5c139452aeac1c3a9e0d078d320

        $order->save();

        $dt = Carbon::now();
        $user = User::find(1);
        $address = Address::where('user_id', '=', $user->id)->where('default', '=', '1')->get()[0];

        $order = new Order();
        $order->order_id = Order::where('store_id', '=', 1)->count() + 1;
        $order->user_id = 1;
        $order->store_id = 1;
        $order->ordered_at = $dt;
        $order->expired_at = $dt->addDay(2);

        $order->total_cost = 5000.50;
        $order->recv_address = $address->address;
        $order->recv_name = $address->receiver;
        $order->recv_tel = $address->telephone;
        $order->shipment_type = 'DHL';
<<<<<<< HEAD
=======
        // $order->payment_type = 'Transfering';
>>>>>>> 455e7f5485fba5c139452aeac1c3a9e0d078d320

        $order->save();
    }
}
