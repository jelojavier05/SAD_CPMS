<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblaccount', function (Blueprint $table) {
            $table->increments('intAccountID');
            $table->integer('intGuardID')->unsigned();
            $table->string('strUsername', 30);
            $table->string('strPassword', 30);
            $table->integer('intAccountType');//1 = admin, 2 = sg, 3 =client 
            
            
            $table->foreign('intGuardID')->references('intGuardID')->on('tblguard');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblaccount');
    }
}
