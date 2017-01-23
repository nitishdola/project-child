<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth,Crypt,Redirect,DB;
use App\Student;

class StudentsController extends Controller
{
    public function viewInfo($student_id = NULL) {
    	$student_id = Crypt::decrypt($student_id);
    	$results 	= Student::findOrFail($student_id);
    	
    	$diseases = DB::table('checkup_diseases')
            ->join('checkups', 'checkups.id', '=', 'checkup_diseases.checkup_id')
            ->join('students', 'students.id', '=', 'checkups.student_id')
            ->join('diseases', 'diseases.id',  '=',  'checkup_diseases.disease_id')
            ->join('sub_diseases', 'sub_diseases.id',  '=',  'checkup_diseases.sub_disease_id')
            ->select('diseases.id as diseasesId','diseases.name as diseasesName', 'sub_diseases.name as subDiseasename', 'checkups.height as height','checkups.weight as weight','checkups.class as class','checkups.section as section', 'checkups.stream as stream')
            ->where('students.id', $student_id)
            ->get();
        return view('admin.students.info', compact('results'));
    }
}
