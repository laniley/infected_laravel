<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infection extends Model
{
    public function user()
    {
        return $this->belongsTo('User');
    }
}
