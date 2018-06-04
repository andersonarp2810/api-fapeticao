<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmailResource extends JsonResource
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
            'type' => 'email',
            'id' => (string)$this->id,
            'attributes' => [
                'email' => $this->email,
                'related' => [
                    'dono' => $this->dono_type == 'usuario' ? new UserResource($this->dono) : new ParteAtendidaResource($this->dono)
                ],
            ],
            'links' => [
                'self' => route('emails.show', ['email' => $this->id]),
                'related' => [
                    'dono' => $this->dono_type == 'usuario' ? route('users.show', ['user' => $this->dono->id]) : route('parte_atendidas.show', ['parteatendida' => $this->dono->id])
                ]
            ]
        ];
    }
}
