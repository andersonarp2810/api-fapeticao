<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdministradorResource extends JsonResource
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
            'type' => 'administrador',
            'id' => (string)$this->id,
            'attributes' =>  [
                'nome' => $this->nome,
                'cadastro_profissional' => $this->cadastro_profissional
            ],
            'links' => [
                'self' => route('administradors.show', ['administrador' => $this->id])
            ],
        ];
    }
}
