<?php

namespace App\Http\Controllers;

use App\Professor;
use App\Http\Resources\ProfessorResource;
use App\Http\Resources\ProfessorsResource;
use App\Http\Requests\ProfessorRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HTTPResponse;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', Professor::class);
        return new ProfessorsResource(Professor::orderBy('id', 'asc')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfessorRequest $request)
    {
        $this->authorize('create', Professor:: class);
        $professor = new Professor($request->all());

        $professor->save();

        return response([
            'data' => $professor
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function show(Professor $professor)
    {
        $this->authorize('view', Professor::class);
        ProfessorResource::withoutWrapping();
        
        return new ProfessorResource($professor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Professor $professor)
    {
        $this->authorize('update', $professor, $request);
        $professor->update($request->all());

        return response([
            'data' => $professor
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professor $professor)
    {
        $this->authorize('delete', Professor::class);
        $professor->delete();

        return response(null, 204);
    }
}
