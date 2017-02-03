<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model {

	protected $table = 'labs';

	protected $fillable = array('user_id', 'costs', 'construction_time', 'construction_start', 'status');

	protected $hidden = array('created_at', 'updated_at');

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
