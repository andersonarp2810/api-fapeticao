<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorEquipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professor_equipes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_professor');
            $table->unsignedInteger('id_equipe');
            $table->timestampsTz();

            $table->foreign('id_professor')->references('id')->on('professors')->onDelete('cascade');
            $table->foreign('id_equipe')->references('id')->on('equipes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professor_equipes');
    }
}
