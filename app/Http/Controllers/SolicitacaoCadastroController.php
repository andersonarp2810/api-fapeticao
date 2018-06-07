<?php

namespace App\Http\Controllers;

use App\SolicitacaoCadastro;
use App\User;
use App\Aluno;
use App\Administrador;
use App\Defensor;
use App\Professor;
use App\Http\Requests\SolicitacaoCadastroRequest;
use App\Http\Resources\SolicitacaoCadastroResource;
use App\Http\Resources\SolicitacaoCadastrosResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class SolicitacaoCadastroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('isAdmin', SolicitacaoCadastro::class);
        return new SolicitacaoCadastrosResource(SolicitacaoCadastro::orderBy('id', 'asc')->paginate(10));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SolicitacaoCadastroRequest $request)
    {
        // qualquer um pode fazer sem nem logar
        $solicitacaoCadastro = new SolicitacaoCadastro($request->all());

        $solicitacaoCadastro->senha = bcrypt($solicitacaoCadastro->senha);

        $solicitacaoCadastro->save();

        return response([
            'data' => new SolicitacaoCadastroResource($solicitacaoCadastro)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SolicitacaoCadastro  $solicitacaoCadastro
     * @return \Illuminate\Http\Response
     */
    public function show(SolicitacaoCadastro $solicitacaoCadastro)
    {
        //
        $this->authorize('isAdmin', SolicitacaoCadastro::class);
        SolicitacaoCadastroResource::withoutWrapping();

        return new SolicitacaoCadastroResource($solicitacaoCadastro);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SolicitacaoCadastro  $solicitacaoCadastro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SolicitacaoCadastro $solicitacaoCadastro)
    {
        //
        $this->authorize('isAdmin', SolicitacaoCadastro::class);
        $solicitacaoCadastro->update($request->all());

        return response([
            'data' => new SolicitacaoCadastro($solicitacaoCadastro)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SolicitacaoCadastro  $solicitacaoCadastro
     * @return \Illuminate\Http\Response
     */
    public function destroy(SolicitacaoCadastro $solicitacaoCadastro)
    {
        //
        $this->authorize('isAdmin', SolicitacaoCadastro::class);
        $solicitacaoCadastro->delete();

        return response(null, 204);
    }

    /**
     * Metodo para aprovar uma solicitação e criar um \App\User e uma Pessoa
     *
     * @param \App\SolicitacaoCadastro $solicitacaoCadastro
     * @return \Illuminate\Http\Response
     */
    public function aprovarCadastro(SolicitacaoCadastro $solicitacaoCadastro){
        
        $this->authorize('isAdmin', SolicitacaoCadastro::class);

        switch($solicitacaoCadastro->pessoa_tipo){
            case 'aluno':
                $pessoa = new Aluno([
                    'nome' => $solicitacaoCadastro->nome,
                    'matricula' => $solicitacaoCadastro->cadastro,
                ]);
                break;
            case 'administrador':
                $pessoa = new Administrador([
                    'nome' => $solicitacaoCadastro->nome,
                    'cadastro_profissional' => $solicitacaoCadastro->cadastro,
                ]);
                break;
            case 'defensor':
                $pessoa = new Defensor([
                    'nome' => $solicitacaoCadastro->nome,
                    'cadastro_profissional' => $solicitacaoCadastro->cadastro,
                ]);
                break;
            case 'professor':
                $pessoa = new Professor([
                    'nome' => $solicitacaoCadastro->nome,
                    'matricula' => $solicitacaoCadastro->cadastro,
                ]);
                break;
            default:
                return response([
                    'erro' => 'Tipo de pessoa inválido'
                ], 500);
        }
        $pessoa->save();
        $user = new User([
            'email' => $solicitacaoCadastro->login,
            'password' => $solicitacaoCadastro->senha,
            'pessoa_id' => $pessoa->id,
            'pessoa_type' => $solicitacaoCadastro->pessoa_tipo
        ]);
        $user->save();

        $solicitacaoCadastro->delete();

        return response([
            'data' => new UserResource($user)
        ], 201);
    }
}
