<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblcheckinfo', function (Blueprint $table) {
            $table->increments('intCheckInfoID');
            $table->integer('intPaymentID')->unsigned();
            $table->string('strBankName', 150);
            $table->string('strClientName', 150);
            $table->string('strAccountNumber', 150);
            $table->decimal('deciAmount', 8, 2);
            $table->date('dateIssued');
            
            $table->foreign('intPaymentID')->references('intPaymentID')->on('tblpayment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblcheckinfo');
    }
}
