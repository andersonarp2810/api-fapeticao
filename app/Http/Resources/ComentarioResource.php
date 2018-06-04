<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComentarioResource extends JsonResource
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
            'type' => 'comentário',
            'id' => (string)$this->id,
            'attributes' => [
                'linha' => $this->linha,
                'texto' => $this->texto
            ],
            'links' => [
                'self' => route('comentarios.show', ['comentario' => $this->id]),
                'related' => [
                    'documento' => route('documentos.show', ['documento' => $this->documento->id]),
                    'autor' => $this->autor_type == 'professor' ? route('professors.show', ['professor' => $this->autor->id]) : route('defensor.show', ['defensor' => $this->autor->id])
                ]
            ]
        ];
    }
}
