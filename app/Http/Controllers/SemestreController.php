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
        $this->authorize('view', Semestre::class);
        return new SemestresResource(Semestre::orderBy('id', 'asc')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SemestreRequest $request)
    {
        $this->authorize('create', Semestre::class);
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
        $this->authorize('view', Semestre::class);
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
        $this->authorize('update', Semestre::class);
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
        $this->authorize('delete', Semestre::class);
        $semestre->delete();

        return response(null, 204);
    }
}
