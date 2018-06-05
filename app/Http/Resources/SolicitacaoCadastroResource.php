<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SolicitacaoCadastroResource extends JsonResource
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
            'type' => 'solicitação de cadastro',
            'id' => (string)$this->id,
            'attributes' => [
                'login' => $this->login,
                'nome' => $this->nome,
                'tipo' => $this->pessoa_tipo,
                'cadastro' => $this->cadastro
            ],
            'links' => [
                'self' => route('solicitacao_cadastros.show', ['solicitacao_cadastro' => $this->id])
            ]
        ];
    }
}
