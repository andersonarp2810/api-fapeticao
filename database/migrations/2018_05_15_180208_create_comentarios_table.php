<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_documento');
            $table->unsignedInteger('id_professor'); # que fez
            $table->text('texto');
            $table->unsignedInteger('linha')->nullable();
            $table->timestampsTz(); # deve ser apresentado

            $table->foreign('id_documento')->references('id')->on('documentos');
            $table->foreign('id_professor')->references('id')->on('professors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
}
