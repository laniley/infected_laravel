<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RocketComponent extends Model {

	protected $table = 'rocket_components';

	protected $hidden = array('created_at', 'updated_at', 'myRocketComponentModelMms');

	protected $fillable = array('rocket_id', 'type', 'selectedRocketComponentModelMm');

	public function rocket()
  	{
      	return $this->belongsTo('App\Rocket');
  	}

  	public function selectedRocketComponentModelMm()
  	{
      	return $this->hasOne('App\RocketComponentModelMm');
  	}

	public function myRocketComponentModelMms()
	{
		return $this->hasMany('App\RocketComponentModelMm', 'rocketComponent_id');
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

	public static function convertToArray($row)
  	{
		$data = $row instanceof Arrayable ? $row->toArray() : (array) $row;
		foreach (array_keys($data) as $key) {
		  	if (is_object($data[$key])) {
		      	$data[$key] = $row->$key;
		  	} else if (is_array($data[$key])) {
		      	$data[$key] = static::convertToArray($data[$key]);
		  	}
		}

      	return $data;
  	}
}
