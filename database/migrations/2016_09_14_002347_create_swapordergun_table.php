<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSwapordergunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblswapordergun', function (Blueprint $table) {
            $table->increments('intSwapOrderGunID');
            $table->integer('intSwapGunHeaderID')->unsigned();
            $table->integer('intGunOrderHeaderID')->unsigned();

            $table->foreign('intSwapGunHeaderID')->references('intSwapGunHeaderID')->on('tblswapgunheader');
            $table->foreign('intGunOrderHeaderID')->references('intGunOrderHeaderID')->on('tblgunorderheader');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblswapordergun');
    }
}
