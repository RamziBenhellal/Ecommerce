<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductColoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_colours', function (Blueprint $table) {
            $table->integer('productCode')->unsigned();
            $table->integer('idColour')->unsigned();
            $table->double('quantity');
            $table->timestamps();
            $table->foreign('productCode')->references('productCode')->on('products')->onDelete('cascade');
            $table->foreign('idColour')->references('idColour')->on('colours')->onDelete('cascade');
            $table->index('productCode','idColour');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_colours');
    }
}
