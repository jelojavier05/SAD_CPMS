<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblutilities', function (Blueprint $table) {
            $table->increments('intBillPaymentID');
            $table->string('strAdminName', 100);
            $table->string('strCompanyName');
            $table->string('strAddress');
            $table->string('strContactNumber',15);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblutilities');
    }
}
