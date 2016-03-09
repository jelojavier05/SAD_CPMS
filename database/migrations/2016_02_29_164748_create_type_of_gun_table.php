<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeOfGunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbltypeofgun', function (Blueprint $table) {
            $table->increments('intTypeOfGunID');
            $table->string('strTypeOfGun', 50)->unique();
            $table->string('strDescription');
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
        
        Schema::drop('tbltypeofgun');
    }
}
