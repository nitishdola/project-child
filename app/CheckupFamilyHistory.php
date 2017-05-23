<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckupFamilyHistory extends Model
{
    protected $fillable = array('checkup_id', 'family_history_id');
	protected $table    = 'checkup_family_histories';
	protected $guarded  = ['_token'];

	public static $rules = [
	'checkup_id' 		=>  'required|exists:checkups,id',
	'family_history_id'	=>  'required|exists:family_histories,id',
	];

	public function checkup()
	{
		return $this->belongsTo('App\Checkup', 'checkup_id');
	}

	public function family_history()
	{
		return $this->belongsTo('App\FamilyHistory', 'family_history_id');
	}
}
