<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeticaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peticaos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_tipo_peticao');
            $table->unsignedInteger('id_parte_atendida');
            $table->unsignedInteger('id_documento'); #arquivo do texto
            $table->string('titulo');
            $table->text('texto'); #redundante?
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peticaos');
    }
}
