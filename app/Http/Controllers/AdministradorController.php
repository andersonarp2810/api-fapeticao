<?php

namespace App\Http\Controllers;

use App\Administrador;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Resources\AdministradorResource;
use App\Http\Resources\AdministradorsResource;
use App\Http\Requests\AdministradorRequest;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new AdministradorsResource(Administrador::paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdministradorRequest $request)
    {
        $administrador = new Administrador($request->all());

        $administrador->save();

        return response([
            'data' => $administrador
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function show(Administrador $administrador)
    {   
        AdministradorResource::withoutWrapping();
        return new AdministradorResource($administrador);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrador $administrador)
    {
        $administrador->update($request->all());

        return response([
            'data' => $administrador
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrador $administrador)
    {
        $administrador->delete();

        return response(null, 204);
    }
}
