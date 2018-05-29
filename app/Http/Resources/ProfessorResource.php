<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class ProfessorResource extends JsonResource
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
            'type' => 'professor',
            'id' => (string)$this->id,
            'attributes' => [
                'nome' => $this->nome,
                'matricula' => $this->matricula
            ],
            'links' => [
                'self' => route('professors.show', ['professor' => $this->id]),
                'related' => [
                    'equipes' => $this->equipes->map(function ($equipe){
                        return route('equipes.show', ['equipe' => $equipe->id]);
                    }),
                    'roteiros' => $this->roteiros->map(function ($roteiro){
                        return route('roteiros.show', ['roteiro' => $roteiro->id]);
                    }),
                    'usuário' => route('users.show', ['user' => $this->usuario->id])
                ]
            ],
        ];
    }
}
