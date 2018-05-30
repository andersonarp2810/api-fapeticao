<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OperacaoResource extends JsonResource
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
            'type' => 'operação',
            'id' => (string)$this->id,
            'attributes' => [
                'realizada_em' => $this->created_at,
                'related' => [
                    'usuario' => new UserResource($this->usuario),
                    'tipo_nome' => $this->tipo->nome,
                ]
            ],
            'links' => [
                'self' => route('operacaos.show', ['operacao' => $this->id]),
                'related' => [
                    'usuario' => route('users.show', ['user' => $this->usuario->id]),
                    'tipo' => route('tipo_operacaos.show', ['tipo_operacao' => $this->tipo->id])
                ]
            ]
        ];
    }
}
