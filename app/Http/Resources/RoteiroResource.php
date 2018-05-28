<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoteiroResource extends JsonResource
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
            'type' => 'roteiro',
            'id' => (string)$this->id,
            'attributes' => [
                'texto' => $this->texto
            ],
            'links' => [
                'self' => route('roteiros.show', ['roteiro' => $this->id]),
                'related' => [
                    'professor' => route('professors.show', ['professor' => $this->professor->id])
                ],
            ],
        ];
    }
}
