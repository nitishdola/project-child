<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubDisease extends Model
{
    public function disease() 
    {
        return $this->belongsTo('App\Disease', 'disease_id');
    }
}
