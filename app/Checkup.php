<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkup extends Model
{
    protected $fillable = array('student_id', 'school_id', 'checkup_date','height', 'weight','section', 'class','stream', 'right_naked_eyesight_id', 'right_spects_eyesight_id', 'left_naked_eyesight_id', 'left_spects_eyesight_id', 'color_vision', 'extra_ocular_movement', 'description', 'right_naked_is_partial', 'right_spects_is_partial', 'left_naked_is_partial', 'left_spects_is_partial','department_id', 'hygiene');
	protected $table    = 'checkups';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'student_id' 		=>  'required|exists:students,id',
        'school_id'         =>  'required|exists:schools,id',
    	'checkup_date'		=>  'required|date_format:Y-m-d',
    	'height'			=>  'required',
    	'weight'  			=>  'required',
    	'section'  			=>  'required',
    	'class'  			=>  'required',
    ];

    public function student()
	{
		return $this->belongsTo('App\Student', 'student_id');
	}

    public function findings()
    {
        return $this->hasMany('App\CheckupFinding');
    }

    public function checkup_disease() {
        return $this->hasMany('App\CheckupDisease');
    }
}
