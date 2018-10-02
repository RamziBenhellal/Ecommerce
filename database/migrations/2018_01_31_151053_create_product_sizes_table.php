<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sizes', function (Blueprint $table) {
            $table->integer('productCode')->unsigned();
            $table->integer('idSize')->unsigned();
            $table->double('quantity');
            $table->timestamps();
            $table->foreign('productCode')->references('productCode')->on('products')->onDelete('cascade');
            $table->foreign('idSize')->references('idSize')->on('sizes')->onDelete('cascade');
            $table->index('productCode','idSize');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_sizes');
    }
}
