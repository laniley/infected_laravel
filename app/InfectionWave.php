<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfectionWave extends Model
{
	protected $fillable = [
        'infection_id',
    ];

	public function infection() {
    	return $this->belongsTo('App\Infection');
    }

	public function infectionTransmissions()
	{
		return $this->hasMany('App\InfectionTransmission');
	}

	public function infectionTransmissionIds()
	{
		return $this->infectionTransmissions()->pluck('id')->toArray();
	}
}
