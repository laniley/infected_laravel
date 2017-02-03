<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RocketComponentModel extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'rocket_component_models';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('created_at', 'updated_at', 'levels');

	public function levels()
	{
	    return $this->hasMany('RocketComponentModelLevel', 'rocketComponentModel_id');
	}

	public function scopeCannons($query)
  	{
		return $query->where('rocketComponentType_id', '=', 1);
  	}

  	public function scopeShields($query)
  	{
		return $query->where('rocketComponentType_id', '=', 2);
  	}

  	public function scopeEngines($query)
  	{
		return $query->where('rocketComponentType_id', '=', 3);
  	}
}
