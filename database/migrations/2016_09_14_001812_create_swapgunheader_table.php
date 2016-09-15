<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSwapgunheaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblswapgunheader', function (Blueprint $table) {
            $table->increments('intSwapGunHeaderID');
            $table->integer('intInboxID')->unsigned();
            $table->integer('intClientID')->unsigned();
            $table->string('strNote');
            $table->tinyInteger('boolStatus'); //0 - rejected, 1 - waiting , 2 - rejected
            $table->timestamp('updated_at');

            $table->foreign('intInboxID')->references('intInboxID')->on('tblinbox');
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
        Schema::drop('tblswapgunheader');
    }
}
