<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth,Crypt,Redirect,DB,Validator;
use App\Student, App\Checkup, App\School, App\BloodGroup;

class StudentsController extends Controller
{

	public function create() {
        //$schools     	= School::orderBy('name')->pluck('name', 'id');

        $schools   = School::select(DB::raw("CONCAT(name,' (', short_name, ')') AS name, id"))->pluck('name', 'id');

        $blood_groups   = BloodGroup::orderBy('name')->pluck('name', 'id');
    	return view('admin.students.create', compact('schools', 'blood_groups'));
    }

    public function saveStudent(Request $request) {
        $validator = Validator::make($data = $request->all(), Student::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $data['password'] = bcrypt( config('globals.student_password') );

        $message = '';
        if(Student::create($data)) {
            $message .= 'Student added successfully !';
        }else{
            $message .= 'Unable to add student !';
        }

        return Redirect::route('student.index')->with('message', $message);
    }

    public function listAll(Request $request) {
        $where  = []; 
        $registration_number    = $request->registration_number;
        $school_id              = $request->school_id;
        $name = $request->name;

        if($request->registration_number) {
            $where['registration_number'] = $registration_number;
        }

        if($request->school_id) {
            $where['school_id'] = $school_id;
        }
        
        $where['status'] = 1;
        $results = Student::where('status',1)->where($where)->orderBy('name', 'ASC');

        if($request->name) {
            
            $results->where('name', 'LIKE', '%' . $name . '%');
        }

        $results = $results->paginate(150);

        $schools   = School::select(DB::raw("CONCAT(name,' (', short_name, ')') AS name, id"))->pluck('name', 'id');
        return view('admin.students.list_all', compact('results', 'schools', 'registration_number', 'school_id', 'name'));
    }

    public function disableStudent($student_id = null) {
        $student_id = Crypt::decrypt($student_id);
        $student    = Student::findOrFail($student_id);

        $student->status = 0;
        $message = '';
        if($student->save()) {
            $message .= 'Student Deleted !';
            return Redirect::route('student.index')->with('message', $message);
        }
    }

    public function editStudent( $student_id ) {
        $student_id = Crypt::decrypt($student_id);
        $schools    = School::select(DB::raw("CONCAT(name,' (', short_name, ')') AS name, id"))->pluck('name', 'id');

        $blood_groups   = BloodGroup::orderBy('name')->pluck('name', 'id');

        $student = Student::findOrFail($student_id);
        return view('admin.students.edit', compact('schools', 'blood_groups', 'student'));
    }

    public function updateStudent($student_id = null, Request $request) {
        $rules = Student::$rules;

        $student_id = Crypt::decrypt($student_id);

        $rules['registration_number'] = $rules['registration_number'] . ',id,' . $student_id;

        $validator = Validator::make($data = $request->all(), $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $student = Student::findOrFail($student_id);

        $message = '';

        $student->fill($data);
        if($student->save()) {
            $message .= 'Student Info Updated Successfully !';
        }else{
            $message .= 'Unable to update  Student Info !';
        }

        return Redirect::route('student.index')->with('message', $message);
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
            ->join('schools', 'schools.id', '=', 'students.school_id')
            ->where($where)
            ->where('students.id', '!=', $student_id)
            ->orderBy('students.name')
            ->select('students.name as studentName','students.id as studentId', 'students.sex', 'checkups.checkup_date as checkup_date', 'checkups.class as class','checkups.height as height', 'checkups.weight as weight')->paginate(30);
        return view('admin.students.info', compact('student_info', 'diseases', 'last_checkup','similar_students', 'first_disease' ));
    }
}
