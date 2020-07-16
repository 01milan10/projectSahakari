<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Contact extends JsonResource
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
            'district' => $this->district,
            'address' => $this->address,
            'phone' => $this->phone,
            'alt_phone' => $this->alt_phone,
            'fax' => $this->fax,
            'email' => $this->email,
        ];
    }
}
