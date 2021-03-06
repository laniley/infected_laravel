<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Armada extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'armadas';

	protected $fillable = array('name');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('created_at', 'updated_at');

	// protected $fillable = array('user_id', 'cannon_id', 'shield_id', 'engine_id');
	public function numberOfMembers() {
		$results = DB::select('select COUNT(users.id) AS members_count from armadas
															left join users on armadas.id = users.armada_id
														where armadas.id='.$this->attributes['id'].'
														group by armadas.id ;');

		if(isset($results[0])) {
			return $results[0]->members_count;
		}
	}

	public function scopeOrderByMembersCountDesc($query) {
		$query = $query	->leftJoin('users', function ($join) {
					            $join->on('armadas.id', '=', 'users.armada_id');
					         })
									 ->select(DB::raw(
												 'armadas.id, armadas.name,
												 	count(users.id) AS members_count'
									))
									->groupBy('armadas.id', 'armadas.name')
									->having('members_count', ' < ', '20')
									->orderBy('members_count', 'DESC');
	}

	public function scopeOrderByScoreDesc($query) {
		$query = $query	->leftJoin('users', function ($join) {
					            $join->on('armadas.id', '=', 'users.armada_id');
					         })
									 ->select(DB::raw(
												 'armadas.id, armadas.name,
												 	sum(score) + sum(experience) as score'
									))
									->groupBy('armadas.id', 'armadas.name')
									->orderBy(DB::raw('sum(score) + sum(experience)'), 'DESC');
	}
}
