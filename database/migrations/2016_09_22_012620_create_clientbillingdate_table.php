<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientbillingdateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblclientbillingdate', function (Blueprint $table) {
            $table->increments('intClientBillingDateID');
            $table->integer('intContractID')->unsigned();
            $table->tinyInteger('boolStatus');//0 - N/A, 1 - pending, 2 - paid
            $table->timestamp('dateBill');
            
            $table->foreign('intContractID')->references('intContractID')->on('tblcontract');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblclientbillingdate');
    }
}
