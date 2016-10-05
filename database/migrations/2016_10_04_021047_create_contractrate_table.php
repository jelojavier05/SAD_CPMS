<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractrateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblcontractrate', function (Blueprint $table) {
            $table->increments('intContractRateID');
            $table->integer('intContractID')->unsigned();
            $table->decimal('deciRate', 7, 2);
            $table->timestamp('datetimeEffectivity')->useCurrent = true;
            
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
        Schema::drop('tblcontractrate');
    }
}
