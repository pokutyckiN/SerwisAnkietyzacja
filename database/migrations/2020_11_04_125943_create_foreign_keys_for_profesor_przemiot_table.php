<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeysForProfesorPrzemiotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profesor_przedmiot', function (Blueprint $table) {
            $table->foreign('profesor_id')->references('id')->on('profesors')->onDelete('cascade');
            $table->foreign('przedmiot_id')->references('id')->on('przedmiots')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profesor_przedmiot', function (Blueprint $table){
            $table->dropForeign('profesor_przedmiot_profesor_id_foreign');
            $table->dropForeign('profesor_przedmiot_przemiot_id_foreign');
        });

        //Schema::dropIfExists('foreign_keys_for_profesor_przemiot');
    }
}
