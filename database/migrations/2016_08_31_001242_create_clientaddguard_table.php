<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientaddguardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblclientadditionalguard', function (Blueprint $table) {
            $table->increments('intClientAdditionalID');
            $table->integer('intInboxID')->unsigned();
            $table->integer('intClientPendingID')->unsigned();

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
        Schema::drop('tblclientadditionalguard');
    }
}
