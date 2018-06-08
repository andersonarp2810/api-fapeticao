<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'AuthController@login')->middleware('cors');

Route::post('logout', 'AuthController@logout')->middleware('cors');

Route::group([

    'middleware' => ['auth:api', 'cors', 'jwt.refresh']

], function ($router) {
    Route::post('me', 'AuthController@me');
    Route::apiResource('users', 'UserController');
    Route::apiResource('roteiros', 'RoteiroController');
    Route::apiResource('professors', 'ProfessorController');
    Route::apiResource('administradors', 'AdministradorController');
    Route::apiResource('defensors', 'DefensorController');
    Route::apiResource('parte_atendidas', 'ParteAtendidaController');
    Route::apiResource('semestres', 'SemestreController');
    Route::apiResource('alunos', 'AlunoController');
    Route::apiResource('tipo_operacaos', 'TipoOperacaoController');
    Route::apiResource('estados', 'EstadoController');
    Route::apiResource('operacaos', 'OperacaoController');
    Route::apiResource('tipo_documentos', 'TipoDocumentoController');
    Route::apiResource('documentos', 'DocumentoController');
    Route::apiResource('emails', 'EmailController');
    Route::apiResource('enderecos', 'EnderecoController');
    Route::apiResource('telefones', 'TelefoneController');
    Route::apiResource('comentarios', 'ComentarioController');
    Route::apiResource('pastas', 'PastaController');
    Route::apiResource('tipo_peticaos', 'TipoPeticaoController');
    Route::apiResource('peticaos', 'PeticaoController');
    Route::apiResource('equipes', 'EquipeController');
    Route::post('equipes/{equipe}/professores', 'EquipeController@addProfessor');
    Route::delete('equipes/{equipe}/professores', 'EquipeController@detachProfessor');
    Route::post('equipes/{equipe}/alunos', 'EquipeController@addAluno');
    Route::delete('equipes/{equipe}/alunos', 'EquipeController@detachAluno');
    Route::apiResource('solicitacao_cadastros', 'SolicitacaoCadastroController')->except(['store']);
    Route::post('solicitacao_cadastros/{solicitacao_cadastro}', 'SolicitacaoCadastroController@aprovarCadastro');
});

Route::post('solicitacao_cadastros', [ 'as' => 'solicitacao_cadastros.store', 'uses' => 'SolicitacaoCadastroController@store'])->middleware('cors'); // qualquer um pode criar uma solicitação de cadastro