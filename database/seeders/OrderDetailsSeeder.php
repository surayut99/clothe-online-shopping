<?php

namespace Database\Seeders;

use App\Models\OrderDetail;
use Illuminate\Database\Seeder;

class OrderDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $detail = new OrderDetail();
        $detail->order_id = 2;
        $detail->product_id = 1;
        $detail->qty = 12;
        $detail->price = 30;
        $detail->save();

        $detail = new OrderDetail();
        $detail->order_id = 2;
        $detail->product_id = 2;
        $detail->qty = 20;
        $detail->price = 300;
        $detail->save();
    }
}
