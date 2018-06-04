<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EnderecoResource extends JsonResource
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
            'type' => 'endereço',
            'id' => (string)$this->id,
            'attributes' => [
                'uf' => $this->uf, 
                'cidade' => $this->cidade,
                'bairro' => $this->bairro,
                'logradouro' => $this->logradouro,
                'numero' => $this->numero,
                'complemento' => $this->complemento ?? '',
                'related' =>[
                    'dono' => $this->dono_type == 'usuario' ? new UserResource($this->dono) : new ParteAtendidaResource($this->dono)
                ]
            ],
            'links' => [
                'self' => route('enderecos.show', ['endereco' => $this->id]),
                'related' => [
                    'dono' => $this->dono_type == 'usuario' ? route('users.show', ['user' => $this->dono->id]) : route('parte_atendidas.show', ['parteatendida' => $this->dono->id])
                ]
            ]
        ];
    }
}
