<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblguard', function (Blueprint $table) {
            $table->increments('intGuardID');
            
            $table->string('strFirstName', 100);
            $table->string('strMiddleName', 100);
            $table->string('strLastName', 100);
            $table->date('dateBirthday');
            $table->string('strPlaceBirth', 100);
            $table->string('strContactNumberMobile', 20);
            $table->string('strContactNumberLandline', 15);
            $table->string('strCivilStatus', 30);
            $table->string('strGender', 6);
            $table->string('strLicenseNumber', 30);
            $table->boolean('boolStatus')->default(true);
            $table->timestamps();
            
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblguard');
    }
}
