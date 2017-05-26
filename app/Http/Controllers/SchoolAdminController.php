<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth, DB, Redirect,Validator,Input,Crypt; 
use App\SchoolAdmin, App\Student,App\SchoolClass,App\Disease, App\School, App\Checkup, App\CheckupVaccination;

class SchoolAdminController extends Controller
{
    public function __construct(){
        $this->middleware('school_admin');
        $this->school_id = Auth::guard('school_admin')->user()->school_id;
    }


    public function index(Request $request) {
        $students_count         = Student::whereStatus(1)->where('school_id', $this->school_id)->count();
        
        $students_count_male    = Student::whereStatus(1)->where('school_id', $this->school_id)->whereSex('male')->count();
        $students_count_female  = Student::whereStatus(1)->where('school_id', $this->school_id)->whereSex('female')->count();
        $diseases   = Disease::orderBy('name')->pluck('name', 'id');
        $classes = SchoolClass::orderBy('name')->pluck('name', 'id');

        $base_year = 2009;
        $checkup_years = [];

        for( $i = $base_year; $i <= date('Y'); $i++ ) {
            $checkup_years[$i] = $i;        
        }
       
        return view('school_admin.dashboard', compact('students_count', 'diseases_count', 'sub_diseases_count', 'students_count_male', 'students_count_female', 'checkup_years', 'classes','diseases'));
    }

    public function viewAllStudents(Request $request) {
        $where  = []; 
        $registration_number    = $request->registration_number;
        
        $first_name             = $request->first_name;

        $last_name              = $request->last_name;

        $school_registration_number = $request->school_registration_number;

        if($request->registration_number) {
            $where['registration_number'] = $registration_number;
        }

        if($request->school_registration_number) {
            $where['school_registration_number'] = $school_registration_number;
        }

        $where['school_id'] = $this->school_id;
        
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
        return view('school_admin.students.list_all', compact('results', 'schools', 'registration_number', 'first_name', 'last_name'));
    }

    public function checkupSearch(Request $request) {
        $where = '';
        $checkup_ids = [];
        $school_id  = $request->school_id;
        $class      = $request->class;
        $sex        = $request->sex;
        $disease_id = $request->disease_id;
        $sub_disease_id = $request->sub_disease_id;
        $checkup_year   = $request->checkup_year;
        $section    = $request->section;
        $stream     = $request->stream;
        $semester   = $request->semester;
        $registration_number = $request->registration_number;
        $history    = $request->history;
        $last_name  = $request->last_name;
        $first_name  = $request->first_name;

        $where['latest_checkup.school_id'] = $this->school_id;

        if($request->class) {
          $where['latest_checkup.class']    = $request->class;
        }

        if($request->section) {
          $where['latest_checkup.section']  = $request->section;
        }

        if($request->stream) {
          $where['latest_checkup.stream']   = $request->stream;
        }

        if($request->semester) {
          $where['latest_checkup.semester'] = $request->semester;
        }

        if($request->sex) {
            $where['students.sex']          = $request->sex;
        }



        if($request->disease_id) {
            //checkup id with disease id
            $checkup_ids = [];
            $checkups = DB::table('checkup_diseases')->where('disease_id', $request->disease_id)->get();
            foreach($checkups as $k => $v) {
                $checkup_ids[] = $v->checkup_id;
            }
        }

       

        if($request->sub_disease_id) {
            $checkup_ids = [];
            $checkups = DB::table('checkup_diseases')->where('sub_disease_id', $request->sub_disease_id)->get();
            foreach($checkups as $k => $v) {
                $checkup_ids[] = $v->checkup_id;
            }
        }

        if($request->registration_number) {
          $where['students.registration_number']    = $request->registration_number;
        }
        $where['latest_checkup.status'] = 1;


        

        if($request->checkup_year) {
            if(empty($checkup_ids)) {
                $results = DB::table('checkups as latest_checkup')
                ->join('students', 'students.id', '=', 'latest_checkup.student_id')
                ->join('schools', 'schools.id', '=', 'latest_checkup.school_id')
                ->where($where)  
                ->whereYear('latest_checkup.checkup_date', '=' , $request->checkup_year)
                ->orderby('students.first_name')
                ->select('students.first_name as studentFName', 'students.middle_name as studentMName', 'students.last_name as studentLName', 'students.id as studentId', 'students.registration_number as registration_number', 'students.sex', 'latest_checkup.checkup_date as checkup_date', 'latest_checkup.class as class','latest_checkup.height as height','latest_checkup.section','latest_checkup.stream',  'latest_checkup.weight as weight','students.history as studentHistory');
            }else{
                $results = DB::table('checkups as latest_checkup')
                ->join('students', 'students.id', '=', 'latest_checkup.student_id')
                ->join('schools', 'schools.id', '=', 'latest_checkup.school_id')
                ->where($where)  
                ->whereIn('latest_checkup.id', $checkup_ids)
                ->whereYear('latest_checkup.checkup_date', '=' , $request->checkup_year)
                ->orderby('students.first_name')
                ->select('students.first_name as studentFName', 'students.middle_name as studentMName', 'students.last_name as studentLName', 'students.id as studentId', 'students.registration_number as registration_number', 'students.sex', 'latest_checkup.checkup_date as checkup_date', 'latest_checkup.class as class','latest_checkup.height as height','latest_checkup.section','latest_checkup.stream',  'latest_checkup.weight as weight','students.history as studentHistory');
            }
            
        }else{
            if(empty($checkup_ids)) {
                $student = DB::table('students')->where('registration_number', $request->registration_number)->first();
                //dd($student);
                $results = DB::table('checkups as latest_checkup')
                    ->whereNotExists(function ($query) {
                        $query->select(DB::raw(1))
                               ->from('checkups')
                               ->whereRaw('student_id = latest_checkup.student_id')
                               ->whereRaw('checkup_date > latest_checkup.checkup_date');
                        })
                    ->join('students', 'students.id', '=', 'latest_checkup.student_id')
                    ->join('schools', 'schools.id', '=', 'latest_checkup.school_id')
                    ->where($where)  
                    //->whereIn('latest_checkup.id', $checkup_ids)
                    ->orderby('students.first_name')
                    ->select('students.first_name as studentFName', 'students.middle_name as studentMName', 'students.last_name as studentLName', 'students.id as studentId', 'students.registration_number as registration_number', 'students.sex', 'latest_checkup.checkup_date as checkup_date', 'latest_checkup.class as class','latest_checkup.height as height','latest_checkup.section','latest_checkup.stream',  'latest_checkup.weight as weight','latest_checkup.id as latest_checkup_id','students.history as studentHistory');
            }else{
                $results = DB::table('checkups as latest_checkup')
                    ->whereNotExists(function ($query) {
                        $query->select(DB::raw(1))
                               ->from('checkups')
                               ->whereRaw('student_id = latest_checkup.student_id')
                               ->whereRaw('checkup_date > latest_checkup.checkup_date');
                        })
                    ->join('students', 'students.id', '=', 'latest_checkup.student_id')
                    ->join('schools', 'schools.id', '=', 'latest_checkup.school_id')
                    ->where($where)  
                    ->whereIn('latest_checkup.id', $checkup_ids)
                    ->orderby('students.first_name')
                    ->select('students.first_name as studentFName', 'students.middle_name as studentMName', 'students.last_name as studentLName', 'students.id as studentId', 'students.registration_number as registration_number', 'students.sex', 'students.history as studentHistory',  'latest_checkup.checkup_date as checkup_date', 'latest_checkup.class as class','latest_checkup.height as height','latest_checkup.section','latest_checkup.stream',  'latest_checkup.weight as weight','latest_checkup.id as latest_checkup_id');
            }
        }

        if($request->history) {
            $results->where('students.history', 'like', '%' . $request->history . '%');
        }

         if($request->first_name) {
            $results->where('students.first_name', 'like', '%' . $request->first_name . '%');
        }

         if($request->last_name) {
            $results->where('students.last_name', 'like', '%' . $request->last_name . '%');
        }


        $results = $results->paginate(150);

        $diseases   = Disease::orderBy('name')->pluck('name', 'id');

        $base_year = 2008;
        $checkup_years = [];

        for( $i = $base_year; $i <= date('Y'); $i++ ) {
            $checkup_years[$i] = $i;        
        }
        $classes = SchoolClass::orderBy('name')->pluck('name', 'id');
        return view('school_admin.reports.view', compact('results', 'checkup_years', 'diseases', 'class', 'sex', 'disease_id', 'sub_disease_id', 'checkup_year', 'section', 'stream', 'semester', 'classes', 'registration_number','history','first_name','last_name'));
    }

    public function viewStudentInfo($student_id) {
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
            //$boosters       = Booster::where('checkup_id', $last_checkup->id)->with('vaccine')->get();  
        endif;
        return view('school_admin.students.report_view', compact('student_info', 'diseases', 'last_checkup', 'first_disease', 'vaccinations', 'all_checkups', 'checkup_data'));
    }
}
