<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientswapguardresponseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblclientswapguardresponse', function (Blueprint $table) {
            $table->increments('intClientSwapGuardReponseID');
            $table->integer('intClientSwapGuardRequestID')->unsigned();
            $table->integer('intGuardID')->unsigned();
            $table->integer('intInboxID')->unsigned();
            $table->tinyInteger('boolStatus')->default(1);//0 - rejected, 1 - waiting, 2 - accepted, 3 - unavailable
            $table->timestamp('updated_at');

            $table->foreign('intClientSwapGuardRequestID')->references('intClientSwapGuardRequestID')->on('tblclientswapguardrequest');
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
        Schema::drop('tblclientswapguardresponse');
    }
}
