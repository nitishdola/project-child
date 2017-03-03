<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkup extends Model
{
    protected $fillable = array('student_id', 'checkup_date','height', 'weight','section', 'class','stream');
	  protected $table    = 'checkups';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'student_id' 		=>  'required|exists:students,id',
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
}
