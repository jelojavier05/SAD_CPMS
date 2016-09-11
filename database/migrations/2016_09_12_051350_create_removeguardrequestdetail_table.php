<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemoveguardrequestdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblremoveguarddetail', function (Blueprint $table) {
            $table->increments('intRemoveGuardDetailID');
            $table->integer('intRemoveGuardHeaderID')->unsigned();
            $table->integer('intGuardID')->unsigned();

            $table->foreign('intGuardID')->references('intGuardID')->on('tblguard');
            $table->foreign('intRemoveGuardHeaderID')->references('intRemoveGuardHeaderID')->on('tblremoveguardheader');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblremoveguarddetail');
    }
}
