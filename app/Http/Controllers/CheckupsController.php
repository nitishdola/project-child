<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth,Crypt,Redirect,DB,Validator; 
use App\Student, App\Disease, App\SubDisease;

class CheckupsController extends Controller
{
    public function addCheckup() {
    	$students   = Student::select(DB::raw("CONCAT(name,' (', registration_number, ')') AS name, id"))->pluck('name', 'id');

    	$diseases   	= Disease::whereStatus(1)->orderBy('name', 'DESC')->pluck('name', 'id'); 
    	$sub_diseases   = SubDisease::whereStatus(1)->orderBy('name', 'DESC')->get(); 

    	return view('admin.checkups.add', compact('students', 'diseases', 'sub_diseases'));
    }
}
