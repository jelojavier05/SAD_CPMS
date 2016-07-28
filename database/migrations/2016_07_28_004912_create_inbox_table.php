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
            $table->integer('intAccountID')->unsigned();
            $table->string('strMessage');
            $table->string('strSubject',100);
            $table->timestamp('datetimeSend');
            $table->tinyInteger('boolStatus')->default(1); //0 = read 1 = unread
            
            $table->foreign('intAccountID')->references('intAccountID')->on('tblaccount');
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
