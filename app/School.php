<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table    = 'schools';
    protected $fillable = array('name', 'block_id', 'district_id', 'code', 'enroll');
    protected $guarded  = ['_token'];

    public static $rules = [ 
    	'name' 		=>  'required|max:255', 
    	'code'  	=>  'required|max:127|unique:schools',
    	'block_id'  =>  'required|max:127|exists:blocks,id',
    	'district_id'  =>  'required|max:127|exists:districts,id',
    	'enroll'  	=>  'required|max:127|unique:schools',
    ];
}
