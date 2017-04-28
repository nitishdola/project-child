<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\School, App\Disease, App\Block,App\Student,App\SubDisease, App\SchoolClass;
use DB, Validator, Redirect, Crypt;

class AdminController extends Controller
{
    public function __construct(){
    	$this->middleware('admin');
    }

    public function index(){
    	$schools   = School::select(DB::raw("CONCAT(name,' (', short_name, ')') AS name, id"))->pluck('name', 'id');
    	$diseases 	= Disease::orderBy('name')->pluck('name', 'id');
        $blocks     = Block::orderBy('name')->pluck('name', 'id');

    	//count
    	$blocks_count 		= Block::whereStatus(1)->count();
    	$schools_count 		= School::count();
    	$students_count 	= Student::whereStatus(1)->count();
    	$diseases_count 	= Disease::whereStatus(1)->count();
    	$sub_diseases_count = SubDisease::whereStatus(1)->count();

    	$students_count_male 	= Student::whereStatus(1)->whereSex('male')->count();
    	$students_count_female 	= Student::whereStatus(1)->whereSex('female')->count();

        $classes = SchoolClass::orderBy('name')->pluck('name', 'id');

        $base_year = 2010;
        $checkup_years = [];

        for( $i = $base_year; $i <= date('Y'); $i++ ) {
            $checkup_years[$i] = $i;        
        }
       


    	return view('admin.dashboard', compact('schools', 'diseases', 'blocks', 'blocks_count', 'schools_count', 'students_count', 'diseases_count', 'sub_diseases_count', 'students_count_male', 'students_count_female', 'checkup_years', 'classes'));
    }
}
