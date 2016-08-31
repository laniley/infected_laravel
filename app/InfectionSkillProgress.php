<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfectionSkillProgress extends Model
{
    protected $fillable = [
        'infection_id', 'infection_skill_id',
    ];
}
