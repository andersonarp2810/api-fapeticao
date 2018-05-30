<?php

namespace App\Http\Controllers;

use App\Semestre;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Resources\SemestreResource;
use App\Http\Resources\SemestresResource;
use App\Http\Requests\SemestreRequest;

class SemestreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new SemestresResource(Semestre::paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SemestreRequest $request)
    {
        $semestre = new Semestre($request->all());

        $semestre->save();

        return response([
            'data' => $semestre
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Semestre  $semestre
     * @return \Illuminate\Http\Response
     */
    public function show(Semestre $semestre)
    {
        SemestreResource::withoutWrapping();
        return new SemestreResource($semestre);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Semestre  $semestre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semestre $semestre)
    {
        $semestre->update($request->all());

        return response([
            'data' => $semestre
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Semestre  $semestre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Semestre $semestre)
    {
        $semestre->delete();

        return response(null, 204);
    }
}
