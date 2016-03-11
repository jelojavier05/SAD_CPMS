<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       	Schema::create('tblgun', function (Blueprint $table) {
            $table->increments('intGunID');
            $table->string('strSerialNumber', 100)->unique();
            $table->integer('intTypeOfGunID')->unsigned();
			$table->string('strMaker', 50);
            $table->string('strGunName', 50);
			$table->softDeletes();
            $table->boolean('boolFlag')->default(true);
			
			$table->foreign('intTypeOfGunID')->references('intTypeOfGunID')->on('tbltypeofgun');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblgun');
    }
}
