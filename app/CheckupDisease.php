<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckupDisease extends Model
{
    protected $fillable = array('checkup_id', 'disease_id','sub_disease_id');
	protected $table    = 'checkup_diseases';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'checkup_id' 		=>  'required|exists:checkups,id',
    	'disease_id'		=>  'required|exists:diseases,id',
    	'sub_disease_id'	=>  'required|exists:sub_diseases,id',
    ];

    public function checkup() 
	{
		return $this->belongsTo('App\Checkup', 'checkup_id');
	}

	public function disease() 
	{
		return $this->belongsTo('App\Disease', 'disease_id');
	}

	public function sub_disease() 
	{
		return $this->belongsTo('App\SubDisease', 'sub_disease_id');
	}
}
