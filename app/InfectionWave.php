<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfectionWave extends Model
{
	public function infection() {
    	$this->belongsTo('App\Infection');
    }
}
