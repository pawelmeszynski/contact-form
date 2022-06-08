<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => [
            'type' => 'emails',
            'id' => $this->id,
            'attributes' => [
                'email' => $this->email,
            ],
            'meta' => [
                "copyright" => "Copyright 2015.",
    "authors" => [
        "Pawel Meszynski"
    ]
            ]
        ]
    ];
    }
}
