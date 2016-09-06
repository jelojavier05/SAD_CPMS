<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientswapguardrequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblclientswapguardrequest', function (Blueprint $table) {
            $table->increments('intClientSwapGuardRequestID');
            $table->integer('intClientID')->unsigned();
            $table->integer('intGuardID')->unsigned();
            $table->integer('intInboxID')->unsigned();
            $table->string('strReason');
            $table->tinyInteger('boolStatus')->default(1);//0 - rejected, 1 - waiting, 2 - accepted
            $table->timestamp('updated_at');

            $table->foreign('intClientID')->references('intClientID')->on('tblclient');
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
        Schema::drop('tblclientswapguardrequest');
    }
}
