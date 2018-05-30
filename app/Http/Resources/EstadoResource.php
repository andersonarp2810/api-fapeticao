<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EstadoResource extends JsonResource
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
            'type' => 'estado',
            'id' => (string)$this->id,
            'attributes' =>[
                'nome' => $this->nome,
                'descricao' => $this->descricao
            ],
            'links' => [
                'self' => route('estados.show', ['estado' => $this->id]),
                'related' => [
                    'pastas' => $this->pastas->map(function($pasta){
                        return route('pastas.show', ['pasta' => $pasta->id]);
                    })
                ]
            ]
        ];
    }
}
