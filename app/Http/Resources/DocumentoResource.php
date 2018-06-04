<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DocumentoResource extends JsonResource
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
          'type' => 'documento',
          'id' => (string) $this->id,
          'attributes' => [
              'nome' => $this->nome,
              'caminho' => $this->caminho
          ],
          'links' => [
              'self' => route('documentos.show', ['documento' => $this->id]),
              'related' => [
                    'tipo' => route('tipo_documentos.show', ['tipo_documento' => $this->tipo->id]),
                    
              ]
          ] 
        ];
    }
}
