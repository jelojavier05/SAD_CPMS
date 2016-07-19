<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientpendingnotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblclientpendingnotification', function (Blueprint $table) {
            $table->increments('intClientPendingID');
            $table->integer('intClientID')->unsigned();
            
            $table->date('dateCreated');
            $table->integer('intNumberOfGuard');
            $table->integer('intStatusIdentifier')->default(1);
            
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
        Schema::drop('tblclientpendingnotification');
    }
}
