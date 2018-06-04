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
            $table->unsignedInteger('autor_id');
            $table->string('autor_type'); # professor ou  defensor
            $table->text('texto');
            $table->unsignedInteger('linha')->nullable();
            $table->timestampsTz(); # deve ser apresentado

            $table->index(['autor_id', 'autor_type']);
            $table->foreign('id_documento')->references('id')->on('documentos')->onDelete('cascade');
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
