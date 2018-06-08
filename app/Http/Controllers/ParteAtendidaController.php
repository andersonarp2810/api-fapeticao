<?php

namespace App\Http\Controllers;

use App\ParteAtendida;
use Illuminate\Http\Request;

use App\Http\Resources\ParteAtendidaResource;
use App\Http\Resources\ParteAtendidasResource;
use App\Http\Requests\ParteAtendidaRequest;

class ParteAtendidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', ParteAtendida::class);
        return new ParteAtendidasResource(ParteAtendida::orderBy('id', 'asc')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParteAtendidaRequest $request)
    {
        $this->authorize('create', ParteAtendida::class);
        $parteAtendida = new ParteAtendida($request->all());

        $parteAtendida->save();

        return response([
            'data' => $parteAtendida
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ParteAtendida  $parteAtendida
     * @return \Illuminate\Http\Response
     */
    public function show(ParteAtendida $parteAtendida)
    {
        $this->authorize('view', ParteAtendida::class);
        ParteAtendidaResource::withoutWrapping();
        return new ParteAtendidaResource($parteAtendida);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ParteAtendida  $parteAtendida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParteAtendida $parteAtendida)
    {
        $this->authorize('update', ParteAtendida::class);
        $parteAtendida->update($request->all());

        return response([
            'data' => $parteAtendida
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ParteAtendida  $parteAtendida
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParteAtendida $parteAtendida)
    {
        $this->authorize('delete', ParteAtendida::class);
        $parteAtendida->delete();

        return response(null, 204);
    }
}
