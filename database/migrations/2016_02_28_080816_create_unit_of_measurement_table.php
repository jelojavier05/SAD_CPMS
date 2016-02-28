<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitOfMeasurementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblunitofmeasurement', function (Blueprint $table) {
            $table->increments('intUnitOfMeasurementID');
            $table->string('strUnitOfMeasurement', 100)->unique();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('tblunitofmeasurement');
    }
}
