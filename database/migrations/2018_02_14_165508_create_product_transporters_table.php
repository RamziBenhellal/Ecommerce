<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTransportersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_transporters', function (Blueprint $table) {
            $table->integer('productCode')->unsigned();
            $table->integer('idTransporter')->unsigned();
            $table->double('cost');
            $table->foreign('productCode')->references('productCode')->on('products')->onDelete('cascade');
            $table->foreign('idTransporter')->references('idTransporter')->on('transporters')->onDelete('cascade');
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
        Schema::dropIfExists('product_transporters');
    }
}
