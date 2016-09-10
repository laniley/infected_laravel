<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infection extends Model
{
    protected $fillable = [
        'user_id',
        'name',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

	public function infectionSkillProgresses()
	{
		return $this->hasMany('App\InfectionSkillProgress');
	}

	public function infectionWaves()
	{
		return $this->hasMany('App\InfectionWave');
	}
}
