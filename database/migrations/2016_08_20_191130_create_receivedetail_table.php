<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceivedetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblgunreceivedetail', function (Blueprint $table) {
            $table->increments('intGunReceiveDetailID');
            $table->integer('intGunReceiveHeaderID')->unsigned();
            $table->integer('intGunDeliveryDetailID')->unsigned();
            $table->tinyInteger('boolStatus'); //1 = tinanggap, 0 = di tinanggap

            $table->foreign('intGunReceiveHeaderID')->references('intGunReceiveHeaderID')->on('tblgunreceiveheader');
            $table->foreign('intGunDeliveryDetailID')->references('intGunDeliveryDetailID')->on('tblgundeliverydetail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblgunreceivedetail');
    }
}
