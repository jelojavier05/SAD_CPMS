<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemovegundetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblremovegundetail', function (Blueprint $table) {
            $table->increments('intRemoveGunDetailID');
            $table->integer('intRemoveGunHeaderID')->unsigned();
            $table->integer('intGunID')->unsigned();

            $table->foreign('intRemoveGunHeaderID')->references('intRemoveGunHeaderID')->on('tblremovegunheader');
            $table->foreign('intGunID')->references('intGunID')->on('tblgun');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblremovegundetail');
    }
}
