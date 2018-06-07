<?php

namespace App\Http\Controllers;

use App\TipoOperacao;
use App\Http\Requests\TipoOperacaoRequest;
use App\Http\Resources\TipoOperacaoResource;
use App\Http\Resources\TipoOperacaosResource;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class TipoOperacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return new TipoOperacaosResource(TipoOperacao::orderBy('id', 'asc')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoOperacaoRequest $request)
    {
        //
        $tipo = new TipoOperacao($request->all());

        $tipo->save();

        return response([
            'data' => new TipoOperacaoResource($tipo)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoOperacao  $tipoOperacao
     * @return \Illuminate\Http\Response
     */
    public function show(TipoOperacao $tipoOperacao)
    {
        //
        TipoOperacaoResource::withoutWrapping();
        return new TipoOperacaoResource($tipoOperacao);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoOperacao  $tipoOperacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoOperacao $tipoOperacao)
    {
        //
        $tipoOperacao->update($request->all());

        return response([
            'data' => new TipoOperacaoResource($tipoOperacao)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoOperacao  $tipoOperacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoOperacao $tipoOperacao)
    {
        //
        $tipoOperacao->delete();

        return response(null, 204);
    }
}
