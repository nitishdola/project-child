<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\SubDisease;
use DB;

class ApiController extends Controller
{
    public function subDiseaseList() {
    	if(isset($_GET['disease_id']) && $_GET['disease_id'] != '') {
    		return SubDisease::select('id', 'name')->orderBy('name')->where('disease_id', $_GET['disease_id'])->get();
    	}
    }

    public function studentList() {
    	$status = 1;
    	if(isset($_GET['status']) && $_GET['status'] != '') {
    		$status = $_GET['status'];
    	}
    	return DB::table('students')->whereStatus($status)->select('id', 'name as desc')->get();
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
    
}
