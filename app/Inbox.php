<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    protected $fillable = ['sender_name', 'sender_email', 'message_subject', 'message', 'badge'];
}
