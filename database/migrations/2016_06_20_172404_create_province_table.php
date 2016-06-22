<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvinceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblprovince', function (Blueprint $table) {
            $table->increments('intProvinceID');
            $table->string('strProvinceName', 100)->unique();
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
        Schema::drop('tblprovince');
    }
}
