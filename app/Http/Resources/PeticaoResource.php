<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PeticaoResource extends JsonResource
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
          'type' => 'peticao',
          'id' => (string) $this->id,
          'attributes' => [
              'titulo' => $this->titulo,
              'texto' => $this->texto
          ] ,
          'links' => [
              'self' => route('peticaos.show', ['peticaos' => $this->id]),
              'related' => [
                'tipo' => route('tipo_peticaos.show', ['tipo_peticao' => $this->tipo->id]),
                
            ]
          ]  
        ];
    }
}
