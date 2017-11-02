<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $table = 'contests';
    public $timestamps = true;
    
    protected $fillable = [
        'startDate', 'endDate'
    ];

    public function Contest_user()
    {
        return $this->hasMany('Contest_user', 'contest_id');
    }

}
