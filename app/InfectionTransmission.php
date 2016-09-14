<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfectionTransmission extends Model
{
	protected $fillable = [
        'infection_wave_id',
		'infection_id',
		'user_id',
    ];
}
