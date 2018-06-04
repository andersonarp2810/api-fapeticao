<?php

namespace App\Http\Controllers;

use App\TipoDocumento;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\TipoDocumentoRequest;
use App\Http\Resources\TipoDocumentoResource;
use App\Http\Resources\TipoDocumentosResource;

class TipoDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TipoDocumentosResource(TipoDocumento::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoDocumentoRequest $request)
    {
        $tipo = new TipoDocumento($request->all());

        $tipo->save();

        return response ([
            'data' => new TipoDocumentoResource($tipo)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function show(TipoDocumento $tipoDocumento)
    {
        TipoDocumentoResource::withoutWrapping();
        return new TipoDocumentoResource($tipoDocumento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoDocumento $tipoDocumento)
    {
        $tipoDocumento->update($request->all());

        return response ([
            'data' => new TipoDocumentoResource($tipoDocumento)
        ], 201 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoDocumento $tipoDocumento)
    {
        $tipoDocumento->delete();

        return response (null, 204);
    }
}
