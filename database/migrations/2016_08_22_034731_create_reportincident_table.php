<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportincidentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblreportincident', function (Blueprint $table) {
            $table->increments('intReportIncidentID');
            $table->integer('intClientID')->unsigned();
            $table->integer('intGuardID')->unsigned();
            $table->timestamp('datetimeIncident'); 
            $table->string('strLocation'); 
            $table->string('strDescription'); 
            $table->timestamp('datetimeReport')->useCurrent = true;

            $table->foreign('intClientID')->references('intClientID')->on('tblclient');
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
        Schema::drop('tblreportincident');
    }
}
