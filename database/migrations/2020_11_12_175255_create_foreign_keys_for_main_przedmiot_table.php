<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeysForMainPrzedmiotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('main_przedmiot', function (Blueprint $table) {
            $table->foreign('main_id')->references('id')->on('mains')->onDelete('cascade');
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
        Schema::table('main_przedmiot', function (Blueprint $table){
            $table->dropForeign('main_przedmiot_main_id_foreign');
            $table->dropForeign('main_przedmiot_przedmiot_id_foreign');
        });
    }
}
