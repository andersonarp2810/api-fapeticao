<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitacaoCadastrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitacao_cadastros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login');
            $table->string('senha');
            $table->string('nome');
            $table->string('pessoa_tipo');
            $table->string('cadastro');
            
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
        Schema::dropIfExists('solicitacao_cadastros');
    }
}
