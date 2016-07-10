<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardaddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblguardaddress', function (Blueprint $table) {
            $table->increments('intGuardAddressID');
            $table->integer('intGuardID')->unsigned();
            $table->integer('intProvinceID')->unsigned();
            $table->integer('intCityID')->unsigned();
            $table->string('strAddress');
            
            $table->foreign('intGuardID')->references('intGuardID')->on('tblguard');
            $table->foreign('intProvinceID')->references('intProvinceID')->on('tblprovince');
            $table->foreign('intCityID')->references('intCityID')->on('tblcity');
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblguardaddress');
    }
}
