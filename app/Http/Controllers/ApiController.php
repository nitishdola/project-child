<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\SubDisease;
class ApiController extends Controller
{
    public function subDiseaseList() {
    	if(isset($_GET['disease_id']) && $_GET['disease_id'] != '') {
    		return SubDisease::select('id', 'name')->orderBy('name')->where('disease_id', $_GET['disease_id'])->get();
    	}
    }
}
