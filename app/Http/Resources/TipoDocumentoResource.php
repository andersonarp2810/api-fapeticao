<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TipoDocumentoResource extends JsonResource
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
            'type' => 'tipo de documento',
            'id' => (string) $this->id,
            'attributes' => [
                'nome' => $this->nome,
                'descricao' => $this->descricao
            ],
            'links' => [
                'self' => route('tipo_documentos.show', ['tipo_documentos' => $this->id]),
                'related' => [
                    'documentos' => $this->documentos->map(function($documeto){
                        return route('documentos.show', ['documentos' => $documentos->id]);
                    })
                ]
            ]
        ];
    }
}
