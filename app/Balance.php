<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $fillable=['client_name','client_email','deposited_amount','withdrawn_amount','collected_by','collected_date'];
}
