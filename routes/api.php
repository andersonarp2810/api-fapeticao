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


Route::group([

    'middleware' => ['api', 'cors']

], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
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
});