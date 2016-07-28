<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblcontract', function (Blueprint $table) {
            $table->increments('intContractID');
            $table->integer('intTypeOfContractID')->unsigned();
            $table->integer('intClientID')->unsigned();
            $table->integer('intMonthsDuration');
            $table->decimal('deciRate', 7, 2);
            $table->date('dateStart');
            $table->date('dateEnd');
            $table->tinyInteger('boolStatus')->default(1); //0 = N/A 1 = A

            
            $table->foreign('intClientID')->references('intClientID')->on('tblclient');
            $table->foreign('intTypeOfContractID')->references('intTypeOfContractID')->on('tbltypeofcontract');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblcontract');
    }
}
