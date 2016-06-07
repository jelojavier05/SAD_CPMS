<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeOfContractTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbltypeofcontract', function (Blueprint $table) {
            $table->increments('intTypeOfContractID');
            $table->string('strTypeOfContractName', 100)->unique();
            $table->string('strDescription');
            $table->integer('intMonthDuration');
            $table->softDeletes();
            $table->boolean('boolFlag')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbltypeofcontract');
    }
}
