<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public function Tracks() {
    	return $this->hasMany('App\Track');
    }
    
    public function Spotify() {
    	return $this->belongsTo('App\Spotify');
    }
}
