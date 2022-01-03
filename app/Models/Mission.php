<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $fillable = ['origin','situation', 'stage', 'command', 'active'];
}
