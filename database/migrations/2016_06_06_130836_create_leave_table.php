<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblleave', function (Blueprint $table) {
            $table->increments('intLeaveID');
            $table->string('strLeaveType', 100)->unique();
            $table->integer('intLeaveCount');
            $table->integer('intNotificationPeriod');
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
        Schema::drop('tblleave');
    }
}
