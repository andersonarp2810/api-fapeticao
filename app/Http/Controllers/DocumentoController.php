<?php

namespace App\Http\Controllers;

use App\Documento;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\DocumentoRequest;
use App\Http\Resources\DocumentoResource;
use App\Http\Resources\DocumentosResource;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new DocumentosResource(Documento::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentoRequest $request)
    {
        $documento = new Documento($request->all());

        $documento->save();

        return response([
            'data' => new DocumentoResource($documento)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function show(Documento $documento)
    {
        DocumentoResource::withoutWrapping();
        return new DocumentoResource($documento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Documento $documento)
    {
        $documento->update($request->all());

        return response([
            'data' => new DocumentoResource($documento)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documento $documento)
    {
        $documento->delete();

        return response(null, 204);
    }
}
