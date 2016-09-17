<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSwapguardrequestinboxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblswapguardrequestinbox', function (Blueprint $table) {
            $table->increments('intSwapGuardRequestInboxID');
            $table->integer('intInboxID')->unsigned();
            $table->integer('intSwapGuardHeaderID')->unsigned();

            $table->foreign('intInboxID')->references('intInboxID')->on('tblinbox');
            $table->foreign('intSwapGuardHeaderID')->references('intSwapGuardHeaderID')->on('tblswapguardrequestheader');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblswapguardrequestinbox');
    }
}
