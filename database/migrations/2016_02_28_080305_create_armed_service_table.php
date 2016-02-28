<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArmedServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblarmedservice', function (Blueprint $table) {
            $table->increments('intArmedServiceID');
            $table->string('strArmedServiceName', 100)->unique();
            $table->string('strDescription');
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('tblarmedservice');
    }
}
