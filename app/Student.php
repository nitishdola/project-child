<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table    = 'students';
    protected $fillable = array('name', 'registration_number', 'father_name', 'mother_name', 'dob', 'sex', 'blood_group_id', 'school_id', 'address');
    protected $guarded  = ['_token'];

    public static $rules = [
    	'registration_number'	=>  'required|max:255|unique:students', 
    	'name'  				=>  'required|max:127',
    	'father_name'  			=>  'required|max:127',
    	'mother_name'  			=>  'required|max:127',
    	'dob'  					=>  'required|date_format:Y-m-d',
    	'sex' 					=>  'required|in:male,female,others',
    	'blood_group_id' 		=>  'required|exists:blood_groups,id',
    	'school_id' 			=>  'required|exists:schools,id',
    	'address' 				=>  'required|min:10'
    ];

    public function school() 
    {
        return $this->belongsTo('App\School', 'school_id');
    }

    public function blood_group() 
    {
        return $this->belongsTo('App\BloodGroup', 'blood_group_id');
    }

    
}
