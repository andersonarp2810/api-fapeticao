<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'type' => 'usuário',
            'id' => (string)$this->id,
            'attributes' => [
                'email' => $this->email,
                'nome' => $this->pessoa->nome,
                'tipo' => $this->pessoa_type
            ],
            'links' => [
                'self' => route('users.show', ['user' => $this->id]),
                'related' => [
                    'pessoa' => route(''.$this->pessoa_type.'s.show', [''.$this->pessoa_type => $this->pessoa_id]),
                    'emails' => $this->emails->map(function ($email){
                        return route('emails.show', ['email' => $email->id]);  
                    }),
                    'enderecos' => $this->enderecos->map(function ($endereco){
                        return route('enderecos.show', ['endereco' => $endereco->id]);
                    }),
                    'telefones' => $this->telefones->map(function ($telefone){
                        return route('telefones.show', ['telefone' => $telefone->id]);
                    })
                ]
            ]
        ];
    }
}
