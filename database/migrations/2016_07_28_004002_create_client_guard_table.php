<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientGuardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblclientguard', function (Blueprint $table) {
            $table->increments('intClientGuardID');
            $table->integer('intGuardID')->unsigned();
            $table->integer('intContractID')->unsigned();
            $table->tinyInteger('boolStatus')->default(1); //0 = N/A 1 = A
            $table->timestamps();

            
            $table->foreign('intGuardID')->references('intGuardID')->on('tblguard');
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
        Schema::drop('tblclientguard');
    }
}
