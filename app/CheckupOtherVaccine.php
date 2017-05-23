<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckupOtherVaccine extends Model
{
	protected $fillable = array('checkup_id', 'other_vaccine_id');
	protected $table    = 'checkup_other_vaccines';
	protected $guarded  = ['_token'];

	public static $rules = [
	'checkup_id' 		=>  'required|exists:checkups,id',
	'other_vaccine_id'	=>  'required|exists:other_vaccines,id',
	];

	public function checkup()
	{
		return $this->belongsTo('App\Checkup', 'checkup_id');
	}

	public function other_vaccine()
	{
		return $this->belongsTo('App\OtherVaccine', 'other_vaccine_id');
	}
}
