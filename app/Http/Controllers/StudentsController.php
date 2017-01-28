<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth,Crypt,Redirect,DB;
use App\Student, App\Checkup, App\School, App\BloodGroup;

class StudentsController extends Controller
{

	public function create() {
        $schools     	= School::orderBy('name')->pluck('name', 'id');
        $blood_groups   = BloodGroup::orderBy('name')->pluck('name', 'id');
    	return view('admin.students.create', compact('schools', 'blood_groups'));
    }

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

        $first_disease = $diseases[0]->subDiseaseName;

	    $class  	= $last_checkup->class;
	    $section	= $last_checkup->section;

	    $school_id 	= $student_info->school_id;

        //for pie chart
        $disease_id = $diseases[0]->diseasesId;
        

	    $where['checkups.status'] 		= 1;
	    $where['students.school_id']	= $school_id;
	    $where['checkups.class']		= $class;
	    $where['checkups.section']		= $section;

        $similar_students = DB::table('students')
            ->join('checkups', 'students.id', '=', 'checkups.student_id')
            ->join('checkup_diseases', 'checkup_diseases.checkup_id', '=', 'checkups.id')
            ->join('diseases', 'checkup_diseases.disease_id', '=', 'diseases.id')
            ->join('sub_diseases', 'checkup_diseases.sub_disease_id', '=', 'sub_diseases.id')
            ->where($where)
            ->where('students.id', '!=', $student_id)
            ->orderBy('students.name')
            ->select('students.name as studentName','students.id as studentId', 'students.sex', 'checkups.checkup_date as checkup_date', 'checkups.class as class','checkups.height as height', 'checkups.weight as weight', 'diseases.name as diseaseName', 'sub_diseases.name as subDiseaseName')
            ->paginate(30);

        return view('admin.students.info', compact('student_info', 'diseases', 'last_checkup','similar_students', 'first_disease' ));
    }
}
