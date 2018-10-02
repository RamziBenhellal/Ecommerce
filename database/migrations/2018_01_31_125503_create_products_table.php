<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('productCode');
            $table->string('productName');
            $table->string('mark')->nullable();
            $table->text('description');
            $table->float('price',8,2);
            $table->double('quantity');
            $table->float('weight',10,2)->nullable();
            $table->integer('idCategory')->unsigned();
            $table->foreign('idCategory')->references('idCategory')->on('product_categories')->onDelete('cascade');
            $table->index('productName'); 
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
        Schema::drop('products');
    }
}
