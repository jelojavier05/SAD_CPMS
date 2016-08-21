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
            $table->tinyInteger('boolStatus'); //1 = tinanggap, 0 = di tinanggap
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
