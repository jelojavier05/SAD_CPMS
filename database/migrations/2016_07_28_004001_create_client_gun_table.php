<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientGunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblclientgun', function (Blueprint $table) {
            $table->increments('intClientGunID');
            $table->integer('intGunID')->unsigned();
            $table->integer('intContractID')->unsigned();
            $table->integer('intRound');
            $table->tinyInteger('boolStatus')->default(1); //0 = N/A 1 = A
            $table->timestamps();

            
            $table->foreign('intGunID')->references('intGunID')->on('tblgun');
            $table->foreign('intContractID')->references('intContractID')->on('tblcontract');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblclientgun');
    }
}
