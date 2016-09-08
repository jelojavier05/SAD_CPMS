<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSwapguardrequestdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblswapguardrequestdetail', function (Blueprint $table) {
            $table->increments('intSwapGuardDetailID');
            $table->integer('intSwapGuardHeaderID')->unsigned();
            $table->integer('intGuardID')->unsigned();

            $table->foreign('intGuardID')->references('intGuardID')->on('tblguard');
            $table->foreign('intSwapGuardHeaderID')->references('intSwapGuardHeaderID')->on('tblswapguardrequestheader');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblswapguardrequestdetail');
    }
}
