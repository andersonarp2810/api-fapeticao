<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AlunoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type' => 'aluno', 
            'id' => (string)$this->id,
            'attributes' => [
                'nome' => $this->nome,
                'matricula' => $this->matricula,
            ],
            'links' => [
                'self' => route('alunos.show', ['aluno' => $this->id]),
                'related' => [
                    'usuário' => $this->usuario ? route('users.show', ['user' => $this->usuario->id]) : 'Erro: Não há usuário para esta pessoa', # esse erro não deve acontecer em produção quando estiver implementado o cadastro integrado de usuário e pessoa
                    'equipes' => $this->equipes->map(function ($equipe){
                        return route('equipes.show', ['equipe' => $equipe->id]);
                    }),
                ]
            ]
        ];
    }
}
