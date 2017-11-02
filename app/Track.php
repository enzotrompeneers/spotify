<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $table = 'tracks';
    
    protected $fillable = [
        'name', 'artist_id'
    ];

    public function Artist() {
    	return $this->belongsTo('App\Artist');
    }
}
