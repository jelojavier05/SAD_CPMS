<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasurementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblmeasurement', function (Blueprint $table) {
            $table->increments('intMeasurementID');
            $table->string('strMeasurement', 100)->unique();
            $table->softDeletes();
            $table->boolean('boolFlag')->default(true);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblmeasurement');
    }
}
