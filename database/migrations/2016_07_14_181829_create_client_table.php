<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblclient', function (Blueprint $table) {
            $table->increments('intClientID');
            $table->integer('intNatureOfBusinessID')->unsigned();
            $table->integer('intAccountID')->unsigned();
            
            $table->string('strClientName', 120);
            $table->string('strContactNumber', 20);
            $table->string('strPersonInCharge', 120);
            $table->string('strPOICContactNumber', 20);
            $table->decimal('deciAreaSize', 10,2);
            $table->bigInteger('intPopulation');    
            
            $table->integer('intStatusIdentifier')->default(1);
            $table->timestamps();
            
            $table->softDeletes();
            
            $table->foreign('intNatureOfBusinessID')->references('intNatureOfBusinessID')->on('tblnatureofbusiness');
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
        Schema::drop('tblclient');
    }
}
