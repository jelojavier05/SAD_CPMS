<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardLeaveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblguardleave', function (Blueprint $table) {
            $table->increments('intGuardLeaveID');
            $table->integer('intGuardID')->unsigned();
            $table->integer('intLeaveID')->unsigned();
            $table->integer('intLeaveCount');
            $table->timestamp('dateEffectivity')->useCurrent = true;
            
            $table->foreign('intGuardID')->references('intGuardID')->on('tblguard');
            $table->foreign('intLeaveID')->references('intLeaveID')->on('tblleave');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblguardleave');
    }
}
