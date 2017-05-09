<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = array('name');
	  protected $table    = 'branches';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'name' 				=>  'required|unique:students,name',
    ];

}
