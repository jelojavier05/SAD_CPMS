<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnouncementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblannouncement', function (Blueprint $table) {
            $table->increments('intAnnouncementID');
            $table->string('strSubject');
            $table->string('strMessage');
            $table->tinyInteger('boolStatus');
            $table->timestamp('datetimeCreated')->useCurrent = true;

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblannouncement');
    }
}
