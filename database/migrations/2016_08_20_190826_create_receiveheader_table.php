<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiveheaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblgunreceiveheader', function (Blueprint $table) {
            $table->increments('intGunReceiveHeaderID');
            $table->integer('intGunDeliveryHeaderID')->unsigned();
            $table->integer('intGuardIDReceiver')->unsigned();
            $table->string('strReason');
            $table->timestamp('datetimeReceive')->useCurrent = true;

            $table->foreign('intGunDeliveryHeaderID')->references('intGunDeliveryHeaderID')->on('tblgundeliveryheader');
            $table->foreign('intGuardIDReceiver')->references('intGuardID')->on('tblguard');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblgunreceiveheader');
    }
}
