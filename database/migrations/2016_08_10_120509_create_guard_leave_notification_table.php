<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardLeaveNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblguardleavenotification', function (Blueprint $table) {
            $table->increments('intGuardLeaveNotificationID');
            $table->integer('intGuardLeaveRequestID')->unsigned();
            $table->integer('intInboxID')->unsigned();
            $table->integer('intGuardID')->unsigned();
            $table->tinyInteger('boolStatus')->default(1);
            $table->timestamp('updated_at');

            $table->foreign('intGuardLeaveRequestID')->references('intGuardLeaveRequestID')->on('tblguardleaverequest');
            $table->foreign('intGuardID')->references('intGuardID')->on('tblguard');
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
        Schema::drop('tblguardleavenotification');
    }
}
