<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckupAllergy extends Model
{
    protected $fillable = array('checkup_id', 'allergy_id','allergy_category_id', 'remarks');
	protected $table    = 'checkup_allergies';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'allergy_id'			=>  'required|exists:allergies,id',
    	'allergy_category_id'	=>  'required|exists:allergy_categories,id',
    ];

    public function allergy() 
	{
		return $this->belongsTo('App\Allergy', 'allergy_id');
	}

	public function allergy_category() 
	{
		return $this->belongsTo('App\AllergyCategory', 'allergy_category_id');
	}
}
