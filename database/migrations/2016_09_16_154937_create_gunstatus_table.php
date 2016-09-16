<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGunstatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblgunstatus', function (Blueprint $table) {
            $table->increments('intGunStatusID');
            $table->integer('intGunID')->unsigned();
            $table->tinyInteger('boolStatus');
            $table->timestamp('dateEffectivity');
            
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
        Schema::drop('tblgunstatus');
    }
}
