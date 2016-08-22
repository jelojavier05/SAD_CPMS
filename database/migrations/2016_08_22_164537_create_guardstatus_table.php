<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardstatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblguardstatus', function (Blueprint $table) {
            $table->increments('intGuardStatusID');
            $table->integer('intGuardID')->unsigned();
            $table->tinyInteger('intStatusIdentifier'); 
            $table->timestamp('dateEffectivity');

            $table->foreign('intGuardID')->references('intGuardID')->on('tblguard');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblguardstatus');
    }
}
