<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNatureOfBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblnatureofbusiness', function (Blueprint $table) {
            $table->increments('intNatureOfBusinessID');
            $table->string('strNatureOfBusiness', 100)->unique();
            $table->decimal('deciRate', 7, 2);
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
        Schema::drop('tblnatureofbusiness');
    }
}
