<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnkietaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ankieta', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('profesor_id');
            $table->bigInteger('student_id');
            $table->bigInteger('pytania_id');
            $table->bigInteger('przedmiot_id');
            $table->bigInteger('ocena');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ankieta');
    }
}
