<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use App\School, App\Disease;

class ReportsController extends Controller
{
    public function viewReport(Request $request) {
        $where = '';

        $school_id = $request->school_id;
        $class = $request->class;
        $sex = $request->sex;
        $disease_id = $request->disease_id;
        $sub_disease_id = $request->sub_disease_id;
        $checkup_year = $request->checkup_year;

        if($request->school_id) {
          $where['students.school_id'] = $request->school_id;
        }

        if($request->class) {
          $where['checkups.class'] = $request->class;
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

        $where['checkups.status'] = 1;

        $results = DB::table('students')
            ->join('checkups', 'students.id', '=', 'checkups.student_id')
            ->join('checkup_diseases', 'checkup_diseases.checkup_id', '=', 'checkups.id')
            ->join('diseases', 'checkup_diseases.disease_id', '=', 'diseases.id')
            ->join('sub_diseases', 'checkup_diseases.sub_disease_id', '=', 'sub_diseases.id')
            ->join('schools', 'schools.id', '=', 'students.school_id')
            ->where($where)
            ->select('students.name as studentName','students.id as studentId', 'students.sex', 'checkups.checkup_date as checkup_date', 'checkups.class as class','checkups.height as height', 'checkups.weight as weight', 'diseases.name as diseaseName', 'sub_diseases.name as subDiseaseName');

        if($request->checkup_year) {
            $results->whereYear('checkup_date', '=' , $request->checkup_year);
        }

        $results = $results->paginate(150);

        $schools   = School::select(DB::raw("CONCAT(name,' (', short_name, ')') AS name, id"))->pluck('name', 'id');
        $diseases   = Disease::orderBy('name')->pluck('name', 'id');

        $base_year = 2014;
        $checkup_years = [];

        for( $i = $base_year; $i <= date('Y'); $i++ ) {
            $checkup_years[$i] = $i;        
        }

        return view('admin.reports.view', compact('results', 'schools', 'checkup_years', 'diseases', 'school_id', 'class', 'sex', 'disease_id', 'sub_disease_id', 'checkup_year'));
    }
}
