<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_pasta');
            $table->unsignedInteger('id_tipo_documento');
            $table->string('nome');
            $table->string('caminho');
            $table->timestampsTz();

            $table->foreign('id_pasta')->references('id')->on('pastas')->onDelete('cascade');
            $table->foreign('id_tipo_documento')->references('id')->on('tipo_documentos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos');
    }
}
