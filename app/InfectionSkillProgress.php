<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfectionSkillProgress extends Model
{
    use Traits\HasCompositePrimaryKey;

    protected $primaryKey = array('infection_id', 'infection_skill_id');

    protected $fillable = [
        'infection_id', 'infection_skill_id',
    ];
}
