<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class StudentAdmin extends Authenticatable
{
    protected $table    = 'student_admins';
    protected $fillable = array('student_id', 'username', 'password');
    protected $guarded  = ['_token'];

    public static $rules = [
    	'student_id'			=>  'required|exists:students,id', 
    	'username'  			=>  'required|unique:student_admins',
    	'password'				=>  'required',
    ];
}
