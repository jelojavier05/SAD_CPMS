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
            $table->timestamp('datetimeReceive');

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
