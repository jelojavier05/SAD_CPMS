<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblcity', function (Blueprint $table) {
            $table->increments('intCityID');
            $table->integer('intProvinceID')->unsigned();
            $table->string('strCityName', 100)->unique();
            $table->softDeletes();
            $table->boolean('boolFlag')->default(true);
            
            $table->foreign('intProvinceID')->references('intProvinceID')->on('tblprovince');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblcity');
    }
}
