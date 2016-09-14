<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSwapgundetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblswapgundetail', function (Blueprint $table) {
            $table->increments('intSwapGunDetailID');
            $table->integer('intSwapGunHeaderID')->unsigned();
            $table->integer('intGunID')->unsigned();

            $table->foreign('intSwapGunHeaderID')->references('intSwapGunHeaderID')->on('tblswapgunheader');
            $table->foreign('intGunID')->references('intGunID')->on('tblgun');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblswapgundetail');
    }
}
