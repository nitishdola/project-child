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
        if($request->school_id) {
          $where['latest_checkup.school_id'] = $request->school_id;
        }

        if($request->class) {
          $where['latest_checkup.class'] = $request->class;
        }

        if($request->section) {
          $where['latest_checkup.section'] = $request->section;
        }

        if($request->stream) {
          $where['latest_checkup.stream'] = $request->stream;
        }

        if($request->semester) {
          $where['latest_checkup.semester'] = $request->semester;
        }

        if($request->sex) {
         	$where['students.sex'] = $request->sex;
        }

        if($request->disease_id) {
          $where['checkup_diseases.disease_id'] = $request->disease_id;
        }

        if($request->sub_disease_id) {
          $where['checkup_diseases.sub_disease_id'] = $request->sub_disease_id;
        }

        if($request->registration_number) {
          $where['students.registration_number'] = $request->registration_number;
        }



        $where['latest_checkup.status'] = 1;

        // $results = DB::table('students')
        //     ->join('checkups', 'students.id', '=', 'checkups.student_id')
        //     ->leftJoin('checkup_diseases', 'checkup_diseases.checkup_id', '=', 'checkups.id')
        //     ->leftJoin('diseases', 'checkup_diseases.disease_id', '=', 'diseases.id')
        //     ->leftJoin('sub_diseases', 'checkup_diseases.sub_disease_id', '=', 'sub_diseases.id')
        //     ->join('schools', 'schools.id', '=', 'students.school_id')
        //     ->where($where)
        //     ->orderby('students.first_name')
        //     ->select('students.first_name as studentName','students.id as studentId', 'students.registration_number as registration_number', 'students.sex', 'checkups.checkup_date as checkup_date', 'checkups.class as class','checkups.height as height','checkups.section','checkups.stream',  'checkups.weight as weight', 'diseases.name as diseaseName', 'sub_diseases.name as subDiseaseName');


        $results = DB::table('checkups as latest_checkup')
                ->whereNotExists(function ($query) {
                    $query->select(DB::raw(1))
                           ->from('checkups')
                           ->whereRaw('student_id = latest_checkup.student_id')
                           ->whereRaw('checkup_date > latest_checkup.checkup_date');
                    })
                ->join('students', 'students.id', '=', 'latest_checkup.student_id')
                ->join('schools', 'schools.id', '=', 'latest_checkup.school_id')
                //->leftJoin('checkup_diseases', 'checkup_diseases.checkup_id', '=', 'latest_checkup.id')
               // ->leftJoin('diseases', 'checkup_diseases.disease_id', '=', 'diseases.id')
                //->leftJoin('sub_diseases', 'checkup_diseases.sub_disease_id', '=', 'sub_diseases.id')
                ->where($where)  
                ->orderby('students.first_name')
                ->select('students.first_name as studentFName', 'students.middle_name as studentMName', 'students.last_name as studentLName', 'students.id as studentId', 'students.registration_number as registration_number', 'students.sex', 'latest_checkup.checkup_date as checkup_date', 'latest_checkup.class as class','latest_checkup.height as height','latest_checkup.section','latest_checkup.stream',  'latest_checkup.weight as weight');


        if($request->checkup_year) {
            $results->whereYear('checkup_date', '=' , $request->checkup_year);
        }

        $results = $results->paginate(150); 


        $schools   = School::select(DB::raw("CONCAT(name,' (', short_name, ')') AS name, id"))->pluck('name', 'id');
        $diseases   = Disease::orderBy('name')->pluck('name', 'id');

        $base_year = 2009;
        $checkup_years = [];

        for( $i = $base_year; $i <= date('Y'); $i++ ) {
            $checkup_years[$i] = $i;        
        }
        $classes = SchoolClass::orderBy('name')->pluck('name', 'id');
        return view('admin.reports.view', compact('results', 'schools', 'checkup_years', 'diseases', 'school_id', 'class', 'sex', 'disease_id', 'sub_disease_id', 'checkup_year', 'section', 'stream', 'semester', 'classes', 'registration_number'));
    }
}
