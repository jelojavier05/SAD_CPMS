<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientshiftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblclientshift', function (Blueprint $table) {
            $table->increments('intClientShiftID');
            $table->integer('intClientID')->unsigned();
            $table->time('timeFrom');
            $table->time('timeTo');
            
            
            $table->foreign('intClientID')->references('intClientID')->on('tblclient');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblclientshift');
    }
}
