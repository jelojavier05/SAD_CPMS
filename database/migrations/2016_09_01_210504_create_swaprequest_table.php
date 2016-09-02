<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSwaprequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblswaprequest', function (Blueprint $table) {
            $table->increments('intSwapRequestID');
            $table->integer('intClientGuardSenderID')->unsigned();
            $table->integer('intClientGuardReceiverID')->unsigned();
            $table->integer('intInboxID')->unsigned();
            $table->timestamp('datetimeSwapRequest')->useCurrent = true;
            $table->tinyInteger('boolStatus');//0 - rejected, 1 - waiting, 2 - accepted
            $table->timestamp('updated_at');

            $table->foreign('intClientGuardSenderID')->references('intClientGuardID')->on('tblclientguard');
            $table->foreign('intClientGuardReceiverID')->references('intClientGuardID')->on('tblclientguard');
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
        Schema::drop('tblswaprequest');
    }
}
