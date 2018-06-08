<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Http\Requests\AlunoRequest;
use App\Http\Resources\AlunoResource;
use App\Http\Resources\AlunosResource;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('view', Aluno::class);
        return new AlunosResource(Aluno::orderBy('id', 'asc')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlunoRequest $request)
    {
        //
        $this->authorize('create', Aluno::class);
        $aluno = new Aluno($request->all());

        $aluno->save();

        return response([
            'data' => new AlunoResource($aluno)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function show(Aluno $aluno)
    {
        //
        $this->authorize('view', Aluno::class);
        AlunoResource::withoutWrapping();

        return new AlunoResource($aluno);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aluno $aluno)
    {
        //
        $this->authorize('update', $aluno, $request);
        $aluno->update($request->all());

        return response([
            'data' => new AlunoResource($aluno)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aluno $aluno)
    {
        //
        $this->authorize('delete', Aluno::class);
        $aluno->delete();

        return response(null, 204);
    }
}
