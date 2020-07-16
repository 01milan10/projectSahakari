<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Inbox extends JsonResource
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
            'sender_name' => $this->sender_name,
            'sender_email' => $this->sender_email,
            'subject' => $this->message_subject,
        ];
    }
}
