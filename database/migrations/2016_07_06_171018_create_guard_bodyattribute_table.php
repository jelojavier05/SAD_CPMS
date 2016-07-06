<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardBodyattributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblguardbodyattribute', function (Blueprint $table) {
            $table->increments('intGuardBodyAttributeID');
            $table->integer('intGuardID')->unsigned();
            $table->integer('intBodyAttributeID')->unsigned();
            $table->string('strValue', 50);
            
            $table->foreign('intGuardID')->references('intGuardID')->on('tblguard');
            $table->foreign('intBodyAttributeID')->references('intBodyAttributeID')->on('tblbodyattribute');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblguardbodyattribute');
    }
}
