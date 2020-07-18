<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vision extends Model
{
    protected $fillable = ['coreVision', 'coreMission', 'missionHead', 'subMission'];
}
