<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBodyAttribute extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblbodyattribute', function (Blueprint $table) {
            $table->increments('intBodyAttributeID');
            $table->integer('intMeasurementID')->unsigned();
            $table->string('strBodyAttributeName', 100)->unique();
            $table->softDeletes();
            $table->boolean('boolFlag')->default(true);
            
            $table->foreign('intMeasurementID')->references('intMeasurementID')->on('tblmeasurement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblbodyattribute');
    }
}
