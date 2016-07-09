<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardlicenseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblguardlicense', function (Blueprint $table) {
            $table->increments('intGuardLicenseID');
            $table->integer('intGuardID')->unsigned();
            $table->string('strLicenseNumber',100);
            $table->date('dateIssued');
            $table->date('dateExpiration');
            
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
        Schema::drop('tblguardlicense');
    }
}
