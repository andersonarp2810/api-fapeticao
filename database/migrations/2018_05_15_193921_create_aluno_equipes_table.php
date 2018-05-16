<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunoEquipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_equipes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_aluno');
            $table->unsignedInteger('id_equipe');
            $table->timestampsTz();

            $table->foreign('id_aluno')->references('id')->on('alunos');
            $table->foreign('id_equipe')->references('id')->on('equipes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aluno_equipes');
    }
}
