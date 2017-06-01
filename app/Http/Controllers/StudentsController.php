<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth,Crypt,Redirect,DB,Validator;
use App\Student, App\Checkup, App\School, App\BloodGroup, App\CheckupFinding, App\CheckupVaccination,App\Booster;

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
        $first_name             = $request->first_name;

        $last_name              = $request->last_name;

        if($request->registration_number) {
            $where['registration_number'] = $registration_number;
        }

        if($request->school_id) {
            $where['school_id'] = $school_id;
        }
        
        $where['status'] = 1;
        $results = Student::where('status',1)->where($where)->orderBy('first_name', 'ASC');

        if($request->first_name) {
            
            $results->where('first_name', 'LIKE', '%' . $first_name . '%');
        }

        if($request->last_name) {
            
            $results->where('last_name', 'LIKE', '%' . $last_name . '%');
        }

        $results = $results->paginate(150);

        $schools   = School::select(DB::raw("CONCAT(name,' (', short_name, ')') AS name, id"))->pluck('name', 'id');
        return view('admin.students.list_all', compact('results', 'schools', 'registration_number', 'school_id', 'first_name', 'last_name'));
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
    	$student_info 	= Student::whereId($student_id)->with('blood_group')->first();
    	
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

            $findings       = CheckupFinding::where('checkup_id', $last_checkup->id)->get();

            $vaccinations   = CheckupVaccination::where('checkup_id', $last_checkup->id)->with('vaccine')->get();
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
        return view('admin.students.info', compact('student_info', 'diseases', 'last_checkup','similar_students', 'first_disease', 'findings', 'vaccinations' ));
    }

    public function printView($student_id = NULL) {

        $student_id     = Crypt::decrypt($student_id);
        $student_info   = Student::whereId($student_id)->with('blood_group', 'school')->first();
        
        $last_checkup   = Checkup::where('student_id', $student_id)->orderBy('checkup_date', 'DESC')->first();

        $all_checkups   = Checkup::where('student_id', $student_id)->with( 'checkup_disease', 'checkup_disease.disease', 'checkup_disease.sub_disease', 'checkup_disease.sub_disease.disease')
        ->orderBy('checkup_date', 'DESC')->get();

        //dd($all_checkups);
        $checkup_data = [];
        foreach($all_checkups as $k => $v) {
            $checkupId = $v->id;

            $checkup_data[$k]['checkup_id'] = $checkupId;
            $checkup_data[$k]['checkup_date'] = $v->checkup_date;

            $checkup_data[$k]['height'] = $v->height;
            $checkup_data[$k]['weight'] = $v->weight;

            $checkup_data[$k]['remarks'] = $v->remarks;

            
            //find all disease
            $diseases = DB::table('checkup_diseases')->where('checkup_id', $checkupId)->get();
            
            foreach($diseases as $kd => $vd) {
                $disease_info = DB::table('diseases')->whereId($vd->disease_id)->first();
                $checkup_data[$k]['disease_name'][$kd] = $disease_info->name;

                $sub_disease_info = DB::table('sub_diseases')->whereId($vd->sub_disease_id)->first();
                $checkup_data[$k]['sub_disease_name'][$kd] = $sub_disease_info->name;

                $checkup_data[$k]['description'][$kd] = $v->description;
            }
        }
        //dd($checkup_data);
        if(count($last_checkup)):
            $diseases = DB::table('checkup_diseases')
                ->join('checkups', 'checkups.id', '=', 'checkup_diseases.checkup_id')
                ->join('students', 'students.id', '=', 'checkups.student_id')
                ->join('diseases', 'diseases.id',  '=',  'checkup_diseases.disease_id')
                ->join('sub_diseases', 'sub_diseases.id',  '=',  'checkup_diseases.sub_disease_id')
                ->select('diseases.id as diseasesId','diseases.name as diseasesName', 'sub_diseases.name as subDiseaseName', 'checkup_diseases.description as description')
                ->where('students.id', $student_id)
                ->where('checkup_id', $last_checkup->id)
                ->orderBy('checkups.checkup_date', 'DESC')
                ->get();

            $vaccinations   = CheckupVaccination::where('checkup_id', $last_checkup->id)->with('vaccine')->get();
            $boosters       = Booster::where('checkup_id', $last_checkup->id)->with('vaccine')->get();  
        endif;
        return view('admin.students.print_report', compact('student_info', 'diseases', 'last_checkup', 'first_disease', 'vaccinations', 'all_checkups', 'checkup_data'));
    }
}
