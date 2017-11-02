<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
	protected $table = 'artists';
    public $timestamps = true;
    
    protected $fillable = [
        'name', 'spotify_id'
    ];

    public function Tracks() {
    	return $this->hasMany('App\Track');
    }

 
}
