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

            $table->unsignedBigInteger('store_id');
            $table->foreign('store_id')->references('store_id')->on('stores');
            $table->id('product_id');
            $table->string('product_name');
            $table->string('product_description')->nullable(true);
            $table->string('product_img_path')->default('storage/pictures/ecommerce.png');
            $table->string('product_primary_type');
            $table->string('color');
            $table->string('size');
            $table->bigInteger('qty');
            $table->double('price');
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
//        Schema::table('products', function (Blueprint $table) {
//            $table->dropForeign(['user_id']);
//            $table->dropColumn('user_id');
//            Schema::enableForeignKeyConstraints();
//        });
    }
}
