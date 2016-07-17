<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientaddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblclientaddress', function (Blueprint $table) {
            $table->increments('intClientAddressID');
            $table->integer('intClientID')->unsigned();
            $table->integer('intProvinceID')->unsigned();
            $table->integer('intCityID')->unsigned();
            $table->string('strAddress');
            
            $table->foreign('intClientID')->references('intClientID')->on('tblclient');
            $table->foreign('intProvinceID')->references('intProvinceID')->on('tblprovince');
            $table->foreign('intCityID')->references('intCityID')->on('tblcity');
         
        });

    }

    public function down()
    {
        Schema::drop('tblclientaddress');
    }
}
