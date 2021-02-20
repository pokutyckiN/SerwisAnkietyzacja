<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeysForPrzedmiotStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('przedmiot_student', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
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
        Schema::table('przedmiot_student', function (Blueprint $table){
            $table->dropForeign('przedmiot_student_student_id_foreign');
            $table->dropForeign('przedmiot_student_przedmiot_id_foreign');
        });
    }
}
