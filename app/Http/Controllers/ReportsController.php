<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class ReportsController extends Controller
{
    public function viewReport(Request $request) {
        $where = '';

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
            ->where($where)
            ->select('students.name as studentName','students.id as studentId', 'students.sex', 'checkups.checkup_date as checkup_date', 'checkups.class as class','checkups.height as height', 'checkups.weight as weight', 'diseases.name as diseaseName', 'sub_diseases.name as subDiseaseName')
            ->paginate(150);

        return view('admin.reports.view', compact('results'));
    }
}
