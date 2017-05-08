<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubDisease extends Model
{
	protected $table    = 'sub_diseases';
    protected $fillable = array('name', 'disease_id');
    protected $guarded  = ['_token'];

    public static $rules = [
    	'disease_id'	=>  'required|exists:diseases,id', 
    	'name'  		=>  'required|max:127',
    ];

    public function disease() 
    {
        return $this->belongsTo('App\Disease', 'disease_id');
    }
}
