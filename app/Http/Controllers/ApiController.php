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
    	return DB::table('students')->whereStatus(1)->select('id', 'name', 'registration_number')->get();	
    }
    
}
