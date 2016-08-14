<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCgrmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblcgrm', function (Blueprint $table) {
            $table->increments('intCgrmID');
            $table->integer('intAccountID')->unsigned();
            $table->integer('intClientID')->unsigned();
            $table->string('strMacAddress', 100);

            $table->foreign('intAccountID')->references('intAccountID')->on('tblaccount');
            $table->foreign('intClientID')->references('intClientID')->on('tblclient');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblcgrm');
    }
}
