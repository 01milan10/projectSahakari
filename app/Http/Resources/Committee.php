<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Committee extends JsonResource
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
            'name' => $this->name,
            'designation' => $this->designation,
            'phone' => $this->phone,
            'email' => $this->email,
            'image' => $this->image,
            'facebook' => $this->facebook,
            'gmail' => $this->gmail,
        ];
    }
}
