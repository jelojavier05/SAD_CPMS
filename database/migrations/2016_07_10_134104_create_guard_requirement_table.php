<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardRequirementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblguardrequirement', function (Blueprint $table) {
            $table->increments('intGuardRequirementID');
            $table->integer('intGuardID')->unsigned();
            $table->integer('intRequirementsID')->unsigned();
            
            $table->foreign('intGuardID')->references('intGuardID')->on('tblguard');
            $table->foreign('intRequirementsID')->references('intRequirementsID')->on('tblrequirements');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblguardrequirement');
    }
}
