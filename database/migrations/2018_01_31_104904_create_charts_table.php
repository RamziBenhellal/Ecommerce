<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charts', function (Blueprint $table) {
            $table->increments('idChart');
            $table->integer('idClient')->unsigned();
            $table->integer('nbElement');
            $table->timestamps();
            $table->foreign('idClient')->references('id')->on('users')->onDelete('cascade'); 
            
        });
       

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('charts');
    }
}
