<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblrank', function (Blueprint $table) {
            $table->increments('intRankID');
            $table->integer('intArmedServiceID')->unsigned();
            $table->string('strRank', 100);
            $table->softDeletes();
            $table->boolean('boolFlag')->default(true);
            
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
        Schema::drop('tblrank');
    }
}
