<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use App\School, App\Disease, App\SchoolClass;

class ReportsController extends Controller
{
    public function viewReport(Request $request) {
        
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

        if($request->school_id) {
          $where['latest_checkup.school_id'] = $request->school_id;
        }

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

        $schools   = School::select(DB::raw("CONCAT(name,' (', short_name, ')') AS name, id"))->pluck('name', 'id');
        $diseases   = Disease::orderBy('name')->pluck('name', 'id');

        $base_year = 2008;
        $checkup_years = [];

        for( $i = $base_year; $i <= date('Y'); $i++ ) {
            $checkup_years[$i] = $i;        
        }
        $classes = SchoolClass::orderBy('name')->pluck('name', 'id');
        return view('admin.reports.view', compact('results', 'schools', 'checkup_years', 'diseases', 'school_id', 'class', 'sex', 'disease_id', 'sub_disease_id', 'checkup_year', 'section', 'stream', 'semester', 'classes', 'registration_number','history','first_name','last_name'));
    }
}
