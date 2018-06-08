<?php

namespace App\Http\Controllers;

use App\Estado;
use App\Http\Requests\EstadoRequest;
use App\Http\Resources\EstadoResource;
use App\Http\Resources\EstadosResource;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('view', Estado::class);
        return new EstadosResource(Estado::orderBy('id', 'asc')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstadoRequest $request)
    {
        //
        $this->authorize('create', Estado::class);
        $estado = new Estado($request->all());
        $estado->save();

        return response([
            'data' => new EstadoResource($estado)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function show(Estado $estado)
    {
        //
        $this->authorize('view', Estado::class);
        EstadoResource::withoutWrapping();

        return new EstadoResource($estado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estado $estado)
    {
        //
        $this->authorize('update', Estado::class);
        $estado->update($request->all());

        return response([
            'data' => new EstadoResource($estado)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estado $estado)
    {
        //
        $this->authorize('delete', Estado::class);
        $estado->delete();

        return response(null, 204);
    }
}
