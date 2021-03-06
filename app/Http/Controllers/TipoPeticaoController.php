<?php

namespace App\Http\Controllers;

use App\TipoPeticao;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\TipoPeticaoResource;
use App\Http\Resources\TipoPeticaosResource;
use App\Http\Requests\TipoPeticaoRequest;

class TipoPeticaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('isProfessor', TipoPeticao::class);
        return new TipoPeticaosResource(TipoPeticao::orderBy('id', 'asc')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoPeticaoRequest $request)
    {
        $this->authorize('isProfessor', TipoPeticao::class);
        $tipo = new TipoPeticao($request->all());

        $tipo->save();

        return response ([
            'data' => new TipoPeticaoResource($tipo)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoPeticao  $tipoPeticao
     * @return \Illuminate\Http\Response
     */
    public function show(TipoPeticao $tipoPeticao)
    {
        $this->authorize('isProfessor', $tipoPeticao);
        TipoPeticaoResource::withoutWrapping();
        return new TipoPeticaoResource($tipoPeticao);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoPeticao  $tipoPeticao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoPeticao $tipoPeticao)
    {
        $this->authorize('isProfessor', $tipoPeticao);
        $tipoPeticao->update($request->all());

        return response ([
            'data' => new TipoPeticaoResource($tipoPeticao)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoPeticao  $tipoPeticao
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoPeticao $tipoPeticao)
    {
        $this->authorize('isProfessor', $tipoPeticao);
        $tipoPeticao->delete();

        return response(null, 204);
    }
}
