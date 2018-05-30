<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TipoOperacaoResource extends JsonResource
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
            'type' => 'tipo de operação',
            'id' => (string)$this->id,
            'attributes' => [
                'nome' => $this->nome,
                'descrição' => $this->descricao
            ],
            'links' => [
                'self' => route('tipo_operacaos.show', ['tipo_operacaos' => $this->id]),
                'related' => [
                    'operações' => $this->operacoes->map(function($operacao){
                        return route('operacaos.show', ['operacao' => $operacao->id]);
                    })
                ]
            ]
        ];
    }
}
