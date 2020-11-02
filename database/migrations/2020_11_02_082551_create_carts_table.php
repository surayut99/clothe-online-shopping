<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->nullable(false);
            $table->unsignedBigInteger('product_id')->nullable(false);
            $table->bigInteger('qty')->nullable(false);

            $table->primary(array('customer_id', 'product_id'));
            $table->foreign('customer_id')->references('id')->on('users');
            $table->foreign('product_id')->references('product_id')->on('products');

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
        Schema::dropIfExists('carts');
    }
}
