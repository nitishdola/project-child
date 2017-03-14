<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booster extends Model
{
    protected $fillable = array('checkup_id', 'vaccine_id');
	protected $table    = 'checkup_diseases';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'checkup_id' 		=>  'required|exists:checkups,id',
    	'vaccine_id'		=>  'required|exists:vaccines,id',
    ];

    public function checkup() 
	{
		return $this->belongsTo('App\Checkup', 'checkup_id');
	}

	public function vaccine() 
	{
		return $this->belongsTo('App\Vaccine', 'vaccine_id');
	}
}
