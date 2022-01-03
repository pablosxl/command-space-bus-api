<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MissionHistory extends Model
{
    protected $fillable = ['origin', 'situation', 'command', 'missionId', 'memberId'];
}
