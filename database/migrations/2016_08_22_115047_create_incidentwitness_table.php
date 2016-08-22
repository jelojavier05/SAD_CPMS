<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidentwitnessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblincidentwitness', function (Blueprint $table) {
            $table->increments('intIncidentWitnessID');
            $table->integer('intReportIncidentID')->unsigned();
            $table->string('strWitnessName', 100); 
            $table->string('strContactNumber', 15); 

            $table->foreign('intReportIncidentID')->references('intReportIncidentID')->on('tblreportincident');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblincidentwitness');
    }
}
