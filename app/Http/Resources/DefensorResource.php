<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DefensorResource extends JsonResource
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
            'type' => 'defensor',
            'id' => (string)$this->id,
            'attributes' => [
                'nome' => $this->nome,
                'cadastro_profissional' => $this->cadastro_profissional
            ],
            'links' => [
                'self' => route('defensors.show', ['defensor' => $this->id]),
                'related' => [
                    'usuário' => $this->usuario ? route('users.show', ['user' => $this->usuario->id]) : 'Erro: Não há usuário para esta pessoa' # esse erro não deve acontecer em produção quando estiver implementado o cadastro integrado de usuário e pessoa
                ]
            ]
        ];
    }
}
