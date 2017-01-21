<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\School, App\Disease;
use DB, Validator, Redirect, Crypt;

class AdminController extends Controller
{
    public function __construct(){
    	$this->middleware('admin');
    }

    public function index(){
    	$schools 	= School::pluck('name', 'id');
    	$diseases 	= Disease::orderBy('name')->pluck('name', 'id');
    	return view('admin.dashboard', compact('schools', 'diseases'));
    }
}
