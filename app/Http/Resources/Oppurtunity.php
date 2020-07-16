<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Oppurtunity extends JsonResource
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
            'id' => $this->id,
            'opening' => $this->opening,
            'position' => $this->position,
            'seat' => $this->seat,
            'requirement' => $this->requirement,
        ];
    }
}
