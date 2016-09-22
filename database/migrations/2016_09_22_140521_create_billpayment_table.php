<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillpaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblbillpayment', function (Blueprint $table) {
            $table->increments('intBillPaymentID');
            $table->integer('intClientBillingDateID')->unsigned();
            $table->integer('intPaymentID')->unsigned();
            $table->date('dateBill');
            

            $table->foreign('intClientBillingDateID')->references('intClientBillingDateID')->on('tblclientbillingdate');
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
        Schema::drop('tblbillpayment');
    }
}
