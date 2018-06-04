<?php

namespace App\Http\Controllers;

use App\Comentario;
use App\Http\Requests\ComentarioRequest;
use App\Http\Resources\ComentarioResource;
use App\Http\Resources\ComentariosResource;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return new ComentariosResource(Comentario::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComentarioRequest $request)
    {
        //
        $comentario = new Comentario($request->all());

        $comentario->save();

        return response([
            'data' => new ComentarioResource($comentario)
        ], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function show(Comentario $comentario)
    {
        //
        ComentarioResource::withoutWrapping();
        return new ComentarioResource($comentario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentario $comentario)
    {
        //
        $comentario->update($request->all());

        return response([
            'data' => new ComentarioResource($comentario)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentario $comentario)
    {
        //
        $comentario->delete();

        return response(null, 204);
    }
}
