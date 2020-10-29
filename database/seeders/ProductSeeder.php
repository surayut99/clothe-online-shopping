<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product;
        $product->product_name = 'รองเท้าแตะสัญชาติเกาหลี';
        $product->product_description = 'รองเท้าแตะยางคุณภาพนำเข้าจากจีน';
        $product->product_img_path = 'storage/pictures/ecommerce.png';
        $product->product_primary_type = 'รองเท้า';
        $product->product_secondary_type = 'รองเท้าแตะ';
        $product->color = 'สีเหลือง';
        $product->size = '40';
        $product->price = 550;
        $product->qty = 56;
        $product->seller_id = 'SALERSALER';
        $product->save();

        Product::factory()->count(10)->create();
    }
}
