<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RocketComponentModelMm extends Model {

	protected $table = 'rocket_component_model_mm';

	protected $hidden = array(
		'created_at',
		'updated_at',
		'rocketComponentModelCapacityLevelMm_id',
		'rocketComponentModelRechargeRateLevelMm_id',
		'myRocketComponentModelLevelMms',
		'myRocketComponentModelCapacityLevelMms',
		'myRocketComponentModelRechargeRateLevelMms'
	);

	protected $fillable = array(
		'rocketComponent_id',
		'rocketComponentModel_id'
	);

	public function rocketComponent()
  	{
      	return $this->belongsTo('App\RocketComponent');
  	}

  	public function rocketComponentModel()
  	{
      	return $this->belongsTo('App\RocketComponentModel');
  	}

	public function rocketComponentModelCapacityLevelMm()
  	{
      	return $this->belongsTo('App\RocketComponentModelLevelMm');
  	}

	public function rocketComponentModelRechargeRateLevelMm()
  	{
      	return $this->belongsTo('App\RocketComponentModelLevelMm');
  	}

	public function myRocketComponentModelLevelMms()
  	{
      	return $this->hasMany('App\RocketComponentModelLevelMm', 'rocketComponentModelMm_id');
  	}
}
