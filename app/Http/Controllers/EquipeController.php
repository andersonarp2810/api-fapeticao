<?php

namespace App\Http\Controllers;

use App\Equipe;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\EquipeResource;
use App\Http\Resources\EquipesResource;
use App\Http\Requests\EquipeRequest;

class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new EquipesResource(Equipe::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EquipeRequest $request)
    {
        $equipe = new Equipe($request->all());

        $equipe->save();

        return response ([
            'data' => new EquipeResource($equipe)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function show(Equipe $equipe)
    {
        EquipeResource::withoutWrapping();
        return new EquipeResource($equipe);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipe $equipe)
    {
        $equipe->update($request->all());

        return response([
            'data' => new EquipeResource($equipe)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipe $equipe)
    {
        $equipe->delete();

        return response(null, 204);
    }
}
