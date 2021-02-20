<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeysForMainProfesorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('main_profesor', function (Blueprint $table) {
            $table->foreign('main_id')->references('id')->on('mains')->onDelete('cascade');
            $table->foreign('profesor_id')->references('id')->on('profesors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('main_profesor', function (Blueprint $table){
            $table->dropForeign('main_profesor_main_id_foreign');
            $table->dropForeign('main_profesor_profesor_id_foreign');
        });
    }
}
