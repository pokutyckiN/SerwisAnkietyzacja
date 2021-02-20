<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('imieStudent');
            $table->string('nazwiskoStudent');
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

        });

        Schema::table('students', function (Blueprint $table) {

            //$table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
    });
        Schema::dropIfExists('students');
    }
}
