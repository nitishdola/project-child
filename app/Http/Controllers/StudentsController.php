<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth,Crypt,Redirect,DB;

class StudentsController extends Controller
{
    public function viewInfo($student_id = NULL) {
    	$student_id = Crypt::decrypt($student_id);
    	return $results = DB::table('students')
    	 			->get();
    }
}
