<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth,Crypt,Redirect,DB;
use App\Student, App\Checkup;

class StudentsController extends Controller
{
    public function viewInfo($student_id = NULL) {
    	$student_id 	= Crypt::decrypt($student_id);
    	$student_info 	= Student::findOrFail($student_id);
    	
    	$last_checkup   = Checkup::where('student_id', $student_id)->orderBy('checkup_date', 'DESC')->first();

    	if(count($last_checkup)):
	    	$diseases = DB::table('checkup_diseases')
	            ->join('checkups', 'checkups.id', '=', 'checkup_diseases.checkup_id')
	            ->join('students', 'students.id', '=', 'checkups.student_id')
	            ->join('diseases', 'diseases.id',  '=',  'checkup_diseases.disease_id')
	            ->join('sub_diseases', 'sub_diseases.id',  '=',  'checkup_diseases.sub_disease_id')
	            ->select('diseases.id as diseasesId','diseases.name as diseasesName', 'sub_diseases.name as subDiseaseName')
	            ->where('students.id', $student_id)
	            ->where('checkup_id', $last_checkup->id)
	            ->orderBy('checkups.checkup_date', 'DESC')
	            ->get();
	    endif;

        return view('admin.students.info', compact('student_info', 'diseases', 'last_checkup'));
    }
}
