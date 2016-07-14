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
            
            $table->string('strClientName', 100);
            $table->string('strClientContactNumber', 20);
            $table->string('strPersonInCharge', 100);
            $table->string('strPersonContactNumber', 20);
            $table->decimal('deciSize', 10,2);
            $table->decimal('deciPopulation', 10,2);
            $table->integer('intStatusIdentifier')->default(0);
            
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('intNatureOfBusinessID')->references('intNatureOfBusinessID')->on('tblnatureofbusiness');
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
