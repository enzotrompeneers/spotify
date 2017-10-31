<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spotify extends Model
{
	protected $table = 'spotify';
	public $timestamps = true;

    public function Artist() {
    	return $this->hasMany('App\Artist');
    }
}
