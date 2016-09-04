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

	public function wave()
	{
		return $this->hasOne('App\InfectionWave');
	}
}
