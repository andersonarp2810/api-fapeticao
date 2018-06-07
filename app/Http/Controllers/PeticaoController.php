<?php

namespace App\Http\Controllers;

use App\Peticao;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\PeticaoResource;
use App\Http\Resources\PeticaosResource;
use App\Http\Requests\PeticaoRequest;

class PeticaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PeticaosResource(Peticao::orderBy('id', 'asc')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeticaoRequest $request)
    {
        $peticao = new Peticao($request->all());

        $peticao->save();

        return response([
            'data' => new PeticaoResource($peticao)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Peticao  $peticao
     * @return \Illuminate\Http\Response
     */
    public function show(Peticao $peticao)
    {
        PeticaoResource::withoutWrapping();
        return new PeticaoResource($peticao);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Peticao  $peticao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peticao $peticao)
    {
        $peticao->update($request->all());

        return response ([
            'data' => new PeticaoResource($peticao)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Peticao  $peticao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peticao $peticao)
    {
        $peticao->delete();

        return response(null, 204);
    }
}
