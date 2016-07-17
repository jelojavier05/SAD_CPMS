<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGunlicenseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblgunlicense', function (Blueprint $table) {
            $table->increments('intGunLicenseID');
            $table->integer('intGunID')->unsigned();
            $table->string('strLicenseNumber',100);
            $table->date('dateIssued');
            $table->date('dateExpiration');
            
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
        Schema::drop('tblgunlicense');
    }
}
