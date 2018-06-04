<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TipoPeticaoResource extends JsonResource
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
            'type' => 'tipo de peticao',
            'id' => (string)$this->id,
            'attributes' => [
                'nome' => $this->nome,
                'descricao' =>$this->descricao,
                'modelo' => $this->modelo
            ],
            'links' => [
                'self' => route('tipo_peticaos.show', ['tipo_peticaos' => $this->id]),
                'related' => [
                    // 'peticaos' => $this->peticaos->map(function($peticao) {
                    //     route('peticaos.show', ['peticao' => $peticao->id]);
                    // })
                ]
            ]
        ];
    }
}
