<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('idOrder');
            $table->integer('idChart')->unsigned();
            $table->integer('idClient')->unsigned();
            $table->integer('productCode')->unsigned();
            $table->double('orderQuantity');
            $table->integer('idSize')->unsigned();
            $table->integer('idColour')->unsigned();
            $table->boolean('passed')->default(false);
            $table->timestamps();
            $table->foreign('idChart')->references('idChart')->on('charts')->onDelete('cascade');
            $table->foreign('idClient')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('productCode')->references('productCode')->on('products')->onDelete('cascade');
            $table->foreign('idSize')->references('idSize')->on('sizes')->onDelete('cascade');
            $table->foreign('idColour')->references('idColour')->on('colours')->onDelete('cascade');
            $table->index('idOrder','idChart','idClient','productCode'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
