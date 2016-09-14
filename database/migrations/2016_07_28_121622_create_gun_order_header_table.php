<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGunOrderHeaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblgunorderheader', function (Blueprint $table) {
            $table->increments('intGunOrderHeaderID');
            $table->integer('intClientID')->unsigned();
            $table->tinyInteger('boolStatus')->default(1); //0 = N/A 1 = A
            $table->tinyInteger('tinyintType'); //0 = add, 1 = swap, remove
            $table->timestamps();
            
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
        Schema::drop('tblgunorderheader');
    }
}
