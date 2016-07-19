<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardeducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('tblguardeducation', function (Blueprint $table) {
            $table->increments('intGuardEducationID');
			$table->integer('intGuardID')->unsigned();
            $table->string('strEducationIdentifier',15);
            $table->string('strSchoolName');
            $table->integer('intYearFrom');
            $table->integer('intYearTo');
            
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
        Schema::drop('tblguardeducation');
    }
}

