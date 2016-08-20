    <?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGunDeliveryHeaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblgundeliveryheader', function (Blueprint $table) {
            $table->increments('intGunDeliveryHeaderID');
            $table->integer('intGunOrderHeaderID')->unsigned();
            $table->string('strDeliveredBy', 100);
            $table->string('strContactNumber', 20);
            $table->string('strDeliveryCode', 20);
            $table->timestamp('datetimeDeliver');
            $table->tinyInteger('boolStatus')->default(1); // 1 = unverified || unchecked, 0 = checked || verified
            
            $table->foreign('intGunOrderHeaderID')->references('intGunOrderHeaderID')->on('tblgunorderheader');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblgundeliveryheader');
    }
}
