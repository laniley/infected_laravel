<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use DB;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fb_id', 'first_name', 'last_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 'remember_token',
    ];

    public function infections() {
      $this->hasMany('Infection');
    }

    public function getCurrentInfectionAmount() {
      return DB::table('infections')->where('user_id', $this->attributes['id'])->count();
    }
}
