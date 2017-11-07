<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    protected $table = 'participations';
    public $timestamps = true;
    
    protected $fillable = [
        'points', 'user_id', 'contest_id'
    ];

    public function user() 
    {
        return $this->belongsTo('App\User');//->withTrashed();
    }

    public function contest()
    {
        return $this->belongsTo('App\Contest');
    }
}