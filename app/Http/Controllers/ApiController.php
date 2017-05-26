<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\SubDisease, App\Section, App\Semester, App\Stream, App\Branch;
use DB,Validator,Redirect;

class ApiController extends Controller
{
    public function subDiseaseList() {
    	if(isset($_GET['disease_id']) && $_GET['disease_id'] != '') {
    		return SubDisease::select('id', 'name')->orderBy('name')->where('disease_id', $_GET['disease_id'])->where('status',1)->get();
    	}
    }

    public function subOtherDiseaseList() {
        $_GET['disease_ids'] = [5,6,7,8,9,10,12,13,14,15];
        if(isset($_GET['disease_ids']) && $_GET['disease_ids'] != '') {
            return SubDisease::select('id', 'name')->orderBy('name')->whereIn('disease_id', $_GET['disease_ids'])->where('status',1)->get();
        }
    }

    public function addNewSubDeases() {
        if(isset($_GET['disease_id']) && $_GET['disease_id'] != '') {
            $data = [];
            $data['disease_id'] = $_GET['disease_id'];
            $data['name']       = $_GET['sub_disease_name'];
            return SubDisease::create($data);
        }
    }

    public function studentList() {
    	
    	//return DB::table('students')->whereStatus($status)->select('id',  DB::raw('CONCAT(first_name, " ", middle_name," ",last_name, " - ",registration_number) AS desc'))->get();

        return DB::table('students')->whereStatus(1)->select('id',  DB::raw('CONCAT(first_name," ", registration_number) AS full_name') )->get();

    }

    // public function diseasePC() {
    //     if(isset($_GET['disease_id']) && $_GET['disease_id'] != '') {
    //         $disease_id = $_GET['disease_id'];
    //     }

    //     if(isset($_GET['checkup_id']) && $_GET['checkup_id'] != '') {
    //         $checkup_id = $_GET['checkup_id'];
    //     }

    //     $students = DB::table('checkup_diseases')
    //                     ->join('checkups', 'checkups.id', 'checkup_diseases.checkup_id')
    //                     ->join('')
    //     return DB::table('students')->whereStatus($status)->select('id', 'name as desc')->get();
    // }

    public function getClassSubs() {
        if(isset($_GET['class_id']) && $_GET['class_id'] != '') {
            $class_id = $_GET['class_id'];
            
            $arr = [];

            //check sections
            $results = Section::where('class_id', $class_id)->get();
            if(count($results)) {
                $arr['type'] = 'section';
                $arr['data'] = $results;

                return json_encode($arr);
            }

            $results = Semester::where('class_id', $class_id)->get();
            if(count($results)) {
                $arr['type'] = 'semester';
                $arr['data'] = $results;

                return json_encode($arr);
            }

            $results = Stream::where('class_id', $class_id)->get();
            if(count($results)) {
                $arr['type'] = 'stream';
                $arr['data'] = $results;

                return json_encode($arr);
            }
        }
    }

    public function getSubAllergies() {
        if(isset($_GET['allergy_id']) && $_GET['allergy_id'] != '') {
            return DB::table('allergy_categories')->whereStatus(1)->where('allergy_id', $_GET['allergy_id'])->select('id', 'name')->get();
        }
    }

    public function addNewDepartment() {
        if(isset($_GET['department_name']) && trim($_GET['department_name']) != '') {
            $department_name = trim($_GET['department_name']);
            $data = [];
            $data['name'] = $department_name;

            $validator = Validator::make($data, Branch::$rules);
            if ($validator->fails()) return 0;

            if(Branch::create($data)) {
                return 1;
            }
        }
        return 0;
    }

    public function getAllDepartments() {
        return Branch::whereStatus(1)->orderBy('name')->get();
    }
    
}
