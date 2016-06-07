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
            $table->softDeletes();
            $table->boolean('boolFlag')->default(true);
        });
    }

    public function down()
    {
        Schema::drop('tblarmedservice');
    }
}
