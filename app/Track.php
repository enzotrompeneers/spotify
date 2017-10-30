<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    public function Artist() {
    	return $this->belongsTo('App\Artist');
    }
}
