<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Balance extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return (int)$this->deposited_amount / 1000;
    }
}
