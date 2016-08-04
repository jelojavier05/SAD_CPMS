<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardpendingnotificationTable extends Migration
{
    public function up()
    {
        Schema::create('tblguardpendingnotification', function (Blueprint $table) {
            $table->increments('intGuardPendingID');
            $table->integer('intClientPendingID')->unsigned();
            $table->integer('intGuardID')->unsigned();
            $table->integer('intInboxID')->unsigned();
            
            $table->integer('intStatusIdentifier')->default(1);
            
            $table->foreign('intGuardID')->references('intGuardID')->on('tblguard');
            $table->foreign('intInboxID')->references('intInboxID')->on('tblinbox');
            $table->foreign('intClientPendingID')->references('intClientPendingID')->on('tblclientpendingnotification');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblguardpendingnotification');
    }
}
