<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $table = 'contests';
    public $timestamps = true;
    
    protected $fillable = [
        'startDate', 'endDate', 'user_id'
    ];

    public function User() {
    	return $this->belongsTo('App\User');
    }
}
