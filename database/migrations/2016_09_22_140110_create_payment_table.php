<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblpayment', function (Blueprint $table) {
            $table->increments('intPaymentID');
            $table->decimal('deciAmount', 8, 2);
            $table->tinyInteger('tinyintType'); // 0 - cash, 1 - check
            $table->timestamp('datetimePayment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblpayment');
    }
}
