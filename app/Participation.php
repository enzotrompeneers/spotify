<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    protected $table = 'participations';
    public $timestamps = true;
    
    protected $fillable = [
        'points', 'user_id', 'contest_id'
    ];
}
