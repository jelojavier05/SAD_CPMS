<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSwaprespondTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblswapresponse', function (Blueprint $table) {
            $table->increments('intSwapResponseID');
            $table->integer('intSwapRequestID')->unsigned();
            $table->integer('intInboxID')->unsigned();
            $table->timestamp('datetimeSwapResponse')->useCurrent = true;
            $table->tinyInteger('boolResponse');//0 - rejected, 1 - accepted

            $table->foreign('intSwapRequestID')->references('intSwapRequestID')->on('tblswaprequest');
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
        Schema::drop('tblswapresponse');
    }
}
