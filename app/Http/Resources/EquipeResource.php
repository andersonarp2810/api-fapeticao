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
                ]
            ],
            'links' => [
                'self' => route('equipes.show', ['equipe' => $this->id]),
                'related' => [
                ]
            ]
        ];
    }
}
