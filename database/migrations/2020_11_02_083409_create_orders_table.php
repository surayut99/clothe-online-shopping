<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id')->nullable(false);
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->unsignedBigInteger('store_id')->nullable(false);
            $table->dateTime('order_date')->nullable(false);
            $table->dateTime('exp_date')->nullable(false);
            $table->dateTime('verified_date')->nullable();

            $table->double('total_cost')->nullable(false);
            $table->string('recv_address')->nullable(false);
            $table->string('recv_name')->nullable(false);
            $table->string('recv_tel')->nullable(false);
            $table->enum('status', array('purchasing', 'verifying', 'verified', 'deliveried', 'cancelled'))->default('purchasing');
            $table->enum('shipment', array('Kerry', 'EMS', 'DHL', 'Flash', 'Standard Express'))->nullable(false);
            $table->enum('payment', array('COD', 'Transfering'));
            $table->string('track_id')->nullable();
            $table->string('store_comment')->nullable();

            $table->foreign('store_id')->references('store_id')->on('stores');
            $table->foreign('user_id')->references('id')->on('users');
            $table->primary(['order_id', 'store_id']);

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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('orders');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
