<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArmadaMembershipRequest extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'armada_membership_requests';

	protected $fillable = array('user_id', 'armada_id');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('updated_at');
}
