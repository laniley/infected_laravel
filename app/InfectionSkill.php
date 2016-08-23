<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfectionSkill extends Model
{
    public function infectionSkillType() {
      $this->belongsTo('InfectionSkillType');
    }
}
