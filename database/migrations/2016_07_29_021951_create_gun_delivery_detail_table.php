<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGunDeliveryDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblgundeliverydetail', function (Blueprint $table) {
            $table->increments('intGunDeliveryDetailID');
            $table->integer('intGunDeliveryHeaderID')->unsigned();
            $table->integer('intGunOrderDetailID')->unsigned();
            $table->tinyInteger('boolStatus')->default(1); //0 = di tinanggap 1 = on deliver 2 = natanggap
            
            $table->foreign('intGunDeliveryHeaderID')->references('intGunDeliveryHeaderID')->on('tblgundeliveryheader');
            $table->foreign('intGunOrderDetailID')->references('intGunOrderDetailID')->on('tblgunorderdetail');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblgundeliverydetail');
    }
}
