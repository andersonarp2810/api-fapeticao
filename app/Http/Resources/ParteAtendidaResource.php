<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ParteAtendidaResource extends JsonResource
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
            'type' => 'parte atendida',
            'id' => (string)$this->id,
            'attributes' => [
                'name' => $this->name,
                'rg' => $this->rg,
                'cpf' => $this->cpf
            ],
            'links' => [
                'self' => route('parte_atendidas.show', ['parteatendida' => $this->id]),
                'related' => [
                    'peticao' => $this->peticao->map(function($peticao){
                        return route('peticaos.show', ['peticao' => $this->id]);
                    }),
                ]
            ]
        ];
    }
}
