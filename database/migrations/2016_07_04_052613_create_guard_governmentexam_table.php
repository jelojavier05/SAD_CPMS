<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardGovernmentexamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblguardgovernmentexam', function (Blueprint $table) {
            $table->increments('intGuardGovernmentExamID');
            $table->integer('intGuardID')->unsigned();
            $table->integer('intGovernmentExamID')->unsigned();
            $table->string('strRating', 20);
            $table->date('dateTaken');
            
            $table->foreign('intGuardID')->references('intGuardID')->on('tblguard');
            $table->foreign('intGovernmentExamID')->references('intGovernmentExamID')->on('tblgovernmentexam');
        });
 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblguardgovernmentexam');
    }
}
