<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVitalStatistics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblvitalstatistics', function (Blueprint $table) {
            $table->increments('intVitalStatisticsID');
            $table->string('strVitalStatisticsName', 100)->unique();
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
        Schema::drop('tblvitalstatistics');
    }
}
