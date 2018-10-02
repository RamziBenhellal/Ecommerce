<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mails', function (Blueprint $table) {
            $table->increments('idMail');
            $table->string('object');
            $table->text('message');
            $table->integer('idClient')->unsigned();
            $table->timestamps();
            $table->foreign('idClient')->references('id')->on('users')->onDelete('cascade');
            $table->index('idMail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mails');
    }
}
