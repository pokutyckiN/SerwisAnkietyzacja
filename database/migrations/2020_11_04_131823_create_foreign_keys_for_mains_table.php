<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeysForMainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mains', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('przedmiot_id')->references('id')->on('przedmiots')->onDelete('cascade');
            $table->foreign('profesor_id')->references('id')->on('profesors')->onDelete('cascade');
            $table->foreign('pytania_id')->references('id')->on('pytanias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mains', function (Blueprint $table){
            $table->dropForeign('main_student_id_foreign');
            $table->dropForeign('main_przedmiot_id_foreign');
            $table->dropForeign('main_profesor_id_foreign');
            $table->dropForeign('main_pytania_id_foreign');
        });
       // Schema::dropIfExists('foreign_keys_for_main');
    }
}
