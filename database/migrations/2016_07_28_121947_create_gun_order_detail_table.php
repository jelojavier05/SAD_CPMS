<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGunOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblgunorderdetail', function (Blueprint $table) {
            $table->increments('intGunOrderDetailID');
            $table->integer('intGunOrderHeaderID')->unsigned();
            $table->integer('intGunID')->unsigned();
            $table->integer('intRounds');
            $table->tinyInteger('boolStatus')->default(1); //0 = N/A 1 = A
            
            $table->foreign('intGunOrderHeaderID')->references('intGunOrderHeaderID')->on('tblgunorderheader');
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
        Schema::drop('tblgunorderdetail');
    }
}
