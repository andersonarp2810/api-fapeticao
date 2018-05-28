<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'type' => 'articles',
            'id' => (string)$this->id,
            'attributes' => [
                'email' => $this->email,
            ],
            'links' => [
                'self' => route('users.show', ['user' => $this->id]),
            ]
        ];
    }
}
