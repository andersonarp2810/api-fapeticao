<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EquipeResource extends JsonResource
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
            'type' => 'equipe',
            'id' => (string)$this->id,
            'attributes' => [
                'related' => [
                    'semestre' => [
                        'semestre' => $this->semestre->semestre,
                        'area_de_atuacao' => $this->semestre->area_de_atuacao
                    ],
                ]
            ],
            'links' => [
                'self' => route('equipes.show', ['equipe' => $this->id]),
                'related' => [
                    'professor' => $this->professores->map(function($professor){
                        return route('professors.show', ['professor' => $this->id]);
                    }),
                    'aluno' => $this->alunos->map(function ($aluno){
                        return route('alunos.show', ['aluno' => $aluno->id]);
                    })
                ]
            ]
        ];
    }
}
