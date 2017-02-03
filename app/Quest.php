<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'quests';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('created_at', 'updated_at');

	public function questFulfillmentConditions()
	{
		return $this->hasMany('QuestFulfillmentCondition');
	}
}
