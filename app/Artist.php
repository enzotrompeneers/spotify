<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
	protected $table = 'artists';
	public $timestamps = true;

    public function Tracks() {
    	return $this->hasMany('App\Track');
    }

    public function Spotify() {
    	return $this->belongsTo('App\Spotify');
    }
}
