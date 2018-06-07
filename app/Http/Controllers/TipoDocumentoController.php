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
        $this->authorize('isProfessor', TipoDocumento::class);
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
        $this->authorize('isProfessor', TipoDocumento::class);
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
        $this->authorize('isProfessor', TipoDocumento::class);
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
        $this->authorize('isProfessor', TipoDocumento::class);
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
        $this->authorize('isProfessor', TipoDocumento::class);
        $tipoDocumento->delete();

        return response (null, 204);
    }
}
