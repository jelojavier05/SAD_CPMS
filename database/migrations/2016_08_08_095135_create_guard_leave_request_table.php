<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardLeaveRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblguardleaverequest', function (Blueprint $table) {
            $table->increments('intGuardLeaveRequest');
            $table->integer('intGuardID')->unsigned();
            $table->integer('intLeaveID')->unsigned();
            $table->integer('intInboxID')->unsigned();
            $table->string('strReason');
            $table->date('dateStart');
            $table->date('dateEnd');
            $table->tinyInteger('boolStatus'); //0 = rejected; 1 = waiting; 2 = accepted
            
            $table->foreign('intGuardID')->references('intGuardID')->on('tblguard');
            $table->foreign('intLeaveID')->references('intLeaveID')->on('tblleave');
            $table->foreign('intInboxID')->references('intInboxID')->on('tblinbox');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblguardleaverequest');
    }
}
