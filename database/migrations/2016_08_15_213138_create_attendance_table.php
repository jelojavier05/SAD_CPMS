<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblattendance', function (Blueprint $table) {
            $table->increments('intAttendanceID');
            $table->integer('intGuardID')->unsigned();
            $table->integer('intClientID')->unsigned();
            $table->timestamp('datetimeIn');
            $table->timestamp('datetimeOut');
            $table->decimal('deciTotalHours', 4,2);

            $table->foreign('intGuardID')->references('intGuardID')->on('tblguard');
            $table->foreign('intClientID')->references('intClientID')->on('tblclient');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblattendance');
    }
}
