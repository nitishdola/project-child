<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
	protected $fillable = array('name');
	protected $table    = 'classes';
	protected $guarded  = ['_token'];

	public static $rules = [
		'name' 		=>  'required|unique:classes,name',
	];
}
