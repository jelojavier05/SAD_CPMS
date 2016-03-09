<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGovernmentExamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblgovernmentexam', function (Blueprint $table) {
            $table->increments('intGovernmentExamID');
            $table->string('strGovernmentExam', 100)->unique();
            $table->string('strDescription');
            $table->softDeletes();
            $table->boolean('boolFlag')->default(true);
        });
    }

    
    public function down()
    {
        Schema::drop('tblgovernmentexam');
    }
}
