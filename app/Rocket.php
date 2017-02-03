<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rocket extends Model {

	protected $table = 'rockets';

	protected $fillable = array('user_id', 'cannon_id', 'shield_id', 'engine_id');

	protected $hidden = array('created_at', 'updated_at');

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function rocketComponents()
	{
		return $this->hasMany('App\RocketComponent');
	}
}
