<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('product_name');
            $table->string('product_description');
            $table->string('product_img_path')->default('storage/pictures/ecommerce.png');
            $table->string('product_primary_type');
            $table->string('product_secondary_type');
            $table->string('color');
            $table->string('size');
            $table->bigInteger('qty');
            $table->double('price');
            $table->string('seller_id');
            $table->boolean('recommended')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
