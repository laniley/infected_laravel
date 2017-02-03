<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'messages';

	// protected $fillable = array();

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('updated_at');
}
