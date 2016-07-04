<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardArmedserviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblguardarmedservice', function (Blueprint $table) {
            $table->increments('intGuardArmedServiceID');
            $table->integer('intGuardID')->unsigned();
            $table->integer('intArmedServiceID')->unsigned();
            $table->string('strRank', 50);
            $table->integer('intYear');
            $table->string('strDischarge', 15);
            $table->string('strReason');
            
            $table->foreign('intGuardID')->references('intGuardID')->on('tblguard');
            $table->foreign('intArmedServiceID')->references('intArmedServiceID')->on('tblarmedservice');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblguardarmedservice');
    }
}
