<?php

namespace App\Http\Controllers;

use App\Equipe;
use App\Professor;
use App\Aluno;
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

    // adicionar professor em uma equipe
    public function addProfessor(Request $request, Equipe $equipe){
        $professor = Professor::find($request['id_professor']);
        $equipe->professores->save($professor);

        return response([
            'data' => new EquipeResource($equipe)
        ], 201);
    }

    // remove um professor da equipe sem deletar ninguém
    public function detachProfessor(Request $request, Equipe $equipe){
        $equipe->professores->detach($request['id_professor']);
        return response([
            'data' => new EquipeResource($equipe)
        ], 202);
    }

    // adicionar aluno a equipe
    public function addAluno(Request $request, Equipe $equipe){
        $aluno = Aluno::find($request['id_aluno']);
        $equipe->alunos->save($aluno);
        return response([
            'data' => new EquipeResource($equipe)
        ], 201);
    }

    // remover aluno de equipe sem deletar ninguém
    public function detachAluno(Request $request, Equipe $equipe){
        $equipe->alunos->detach($request['id_aluno']);

        return response([
            'data' => new EquipeResource($equipe)
        ], 202);
    }
}
