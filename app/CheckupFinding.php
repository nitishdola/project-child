<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckupFinding extends Model
{
  protected $fillable = array('checkup_id', 'finding');
  protected $table    = 'checkup_findings';
  protected $guarded  = ['_token'];

  public static $rules = [
    'checkup_id' 		=>  'required|exists:checkups,id',
    'finding'		   =>  'required',
  ];

  public function checkup()
{
  return $this->belongsTo('App\Checkup', 'checkup_id');
}
}
