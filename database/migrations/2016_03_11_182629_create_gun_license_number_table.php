<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGunLicenseNumberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbllicensegun', function (Blueprint $table) {
            $table->increments('intLicenseGunID');
            $table->string('strLicenseNumber', 100)->unique();
            $table->integer('intGunID')->unsigned();
			$table->date('dateIssue');
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
        Schema::drop('tbllicensegun');
    }
}
