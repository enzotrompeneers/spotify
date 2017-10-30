<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spotify extends Model
{
    public function Artist() {
    	return $this->hasMany('App\Artist');
    }
}
