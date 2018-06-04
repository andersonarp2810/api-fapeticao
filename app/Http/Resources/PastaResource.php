<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PastaResource extends JsonResource
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
            'type' => 'pasta',
            'id' => (string)$this->id,
            'attributes' => [
                'related' => [
                    'estado' => new EstadoResource($this->estado)
                ],
            ],
            'links' => [
                'self' => route('pastas.show', ['pasta' => $this->id]),
                'related' => [
                    'equipe' => route('equipes.show', ['equipe' =>$this->id]),
                    'estado' => route('estados.show', ['estado' =>$this->estado]),
                    'documentos' =>$this->documentos->map(function($documento){
                        return route('documentos.show', ['documento' => $documento->id]);
                    })
                ]
            ]
        ];
    }
}
