<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeysForMainStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('main_student', function (Blueprint $table) {
            $table->foreign('main_id')->references('id')->on('mains')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('main_student', function (Blueprint $table){
            $table->dropForeign('main_student_main_id_foreign');
            $table->dropForeign('main_student_student_id_foreign');
        });
    }
}
