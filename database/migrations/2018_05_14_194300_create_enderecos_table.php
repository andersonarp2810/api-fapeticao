<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('id_dono');
            $table->unsignedInteger('tipo_dono');
            $table->string('uf');
            $table->string('cidade');
            $table->string('bairro');
            $table->string('logradouro');
            $table->string('numero');
            $table->string('complemento');           
            
            $table->timestampsTz();

            $table->index(['id_dono', 'tipo_dono']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
}
