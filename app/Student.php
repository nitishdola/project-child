<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table    = 'students';
    protected $fillable = array('name', 'registration_number', 'school_registration_number', 'father_name', 'mother_name', 'dob', 'sex', 'blood_group_id', 'school_id', 'address');
    protected $guarded  = ['_token'];

    public static $rules = [
    	'registration_number'	=>  'required|max:255|unique:students',
        //'school_registration_number'    =>  'required', 
    	'name'  				=>  'required|max:127',
    	'father_name'  			=>  'required|max:127',
    	'mother_name'  			=>  'required|max:127',
    	//'dob'  					=>  'required|date_format:Y-m-d',
    	'sex' 					=>  'required|in:male,female,others',
    	'blood_group_id' 		=>  'required|exists:blood_groups,id',
    	'school_id' 			=>  'required|exists:schools,id',
    	'address' 				=>  'required|min:10'
    ];

    public static $branches = [
        'Mechanical Engineering'                    =>  'Mechanical Engineering',
        'Civil Engineering'                         =>  'Civil Engineering',
        'Computer Science & Engineering'            =>  'Computer Science & Engineering',
        'Electronics & Communication Engineering'   =>  'Electronics & Communication Engineering',
        'Computer Science'                          =>  'Computer Science',
        'Bachelor of Computer Application'          =>  'Bachelor of Computer Application',
        'Bachelor of Science in Digital Film Making & Visual Effects'        =>  'Bachelor of Science in Digital Film Making & Visual Effects',
        'Bachelor of Science and Information Technology'  =>  'Bachelor of Science and Information Technology',
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
