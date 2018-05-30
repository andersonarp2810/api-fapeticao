<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SemestreResource extends JsonResource
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
            'type' => 'semestre',
            'id' => (string) $this->id,
            'attributes' => [
                'semestre' => $this->semestre,
                'area_de_atuacao' => $this->area_de_atuacao
            ],
            'links' => [
                'self' => route('semestres.show', [$this->id]),
                'related' => []
            ]
        ];
    }
}
