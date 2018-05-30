<?php

namespace App\Http\Controllers;

use App\Operacao;
use App\Http\Requests\OperacaoRequest;
use App\Http\Resources\OperacaoResource;
use App\Http\Resources\OperacaosResource;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class OperacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return new OperacaosResource(Operacao::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OperacaoRequest $request)
    {
        //
        $operacao = new Operacao($request->all());

        $operacao->save();

        return response([
            'data' => new OperacaoResource($operacao)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Operacao  $operacao
     * @return \Illuminate\Http\Response
     */
    public function show(Operacao $operacao)
    {
        //
        OperacaoResource::withoutWrapping();

        return new OperacaoResource($operacao);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Operacao  $operacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operacao $operacao)
    {
        //
        $operacao->update($request->all());

        return response([
            'data' => new OperacaoResource($operacao)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Operacao  $operacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operacao $operacao)
    {
        //
        $operacao->delete();

        return response(null, 204);
    }
}
