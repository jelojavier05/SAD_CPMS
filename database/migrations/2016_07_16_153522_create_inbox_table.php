<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInboxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblinbox', function (Blueprint $table) {
            $table->increments('intInboxID');
            $table->integer('intAccountIDSender')->unsigned();
            $table->integer('intAccountIDReceiver')->unsigned();
            $table->string('strMessage');
            $table->string('strSubject',100);
            $table->timestamp('datetimeSend')->useCurrent = true;
            $table->tinyInteger('tinyintStatus')->default(1); //0 = read 1 = unread
            $table->tinyInteger('tinyintType');
            
            $table->foreign('intAccountIDSender')->references('intAccountID')->on('tblaccount');
            $table->foreign('intAccountIDReceiver')->references('intAccountID')->on('tblaccount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblinbox');
    }
}
