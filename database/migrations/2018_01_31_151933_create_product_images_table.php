<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->increments('idImage');
            $table->binary('image');
            $table->integer('productCode')->unsigned();
            $table->enum('type', ['jpg','jpeg', 'gif','bmp','png','webp','bpg','bat']);
            $table->enum('class', ['primary', 'secondary']);
            $table->timestamps();
            $table->foreign('productCode')->references('productCode')->on('products')->onDelete('cascade');
            $table->index('idImage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_images');
    }
}
