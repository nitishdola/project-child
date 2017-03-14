<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckupVaccination extends Model
{
    protected $table    = 'checkup_vaccinations';
    protected $fillable = array('vaccine_id', 'dose_number', 'checkup_id', 'vaccine_date');
    protected $guarded  = ['_token'];

    public static $rules = [
    	'vaccine_id'			=>  'required|exists:vaccines,id', 
    	'dose_number'  			=>  'required|numeric',
    	'checkup_id'			=>  'required|exists:checkups,id',
    	'vaccine_date'			=> 	'date_format:Y-m-d' 
    ];

    public function vaccine() 
    {
        return $this->belongsTo('App\Vaccine', 'vaccine_id');
    }

    public function checkup() 
    {
        return $this->belongsTo('App\Checkup', 'checkup_id');
    }
}
