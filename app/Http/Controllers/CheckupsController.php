<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth,Crypt,Redirect,DB,Validator;
use App\Student, App\Disease, App\SubDisease,App\CheckupDisease,App\CheckupFinding,App\Checkup, App\Vaccine, App\CheckupVaccination, App\Booster;

class CheckupsController extends Controller
{
    public function addCheckup() {
      $vaccines     = Vaccine::get();
    	$diseases   	= Disease::whereStatus(1)->orderBy('name', 'DESC')->pluck('name', 'id');
    	$sub_diseases   = SubDisease::whereStatus(1)->orderBy('name', 'DESC')->get();

    	return view('admin.checkups.add', compact('diseases', 'sub_diseases', 'vaccines'));
    }

    public function postCheckup(Request $request) { 
      DB::beginTransaction();
      $data = $request->all();
      $validator = Validator::make($data, Checkup::$rules);
      if ($validator->fails()) return Redirect::back()->withErrors($validator);
      $checkup = Checkup::create( $data );

      try {
          // add checkup_diseases
          $subdisease_data['checkup_id']    	= $checkup->id;
          for($i = 0; $i < count($request->sub_diseases); $i++) {
              $subdisease_data['sub_disease_id']  = $request->sub_diseases[$i];
              //get Disease is
              $disease = SubDisease::findOrFail($request->sub_diseases[$i]);
              $subdisease_data['disease_id']  = $disease->disease_id;
              $validator = Validator::make($subdisease_data, CheckupDisease::$rules);
              if ($validator->fails()) return Redirect::back()->withErrors($validator);
              CheckupDisease::create( $subdisease_data );
          }
      }catch(ValidationException $e)
      {
          return Redirect::back();
      }

      try {
          // add checkup_diseases
          $finding_data['checkup_id']    	= $checkup->id;
          for($i = 0; $i < count($request->finding); $i++) {
              $finding_data['finding']  = $request->finding[$i];
              $validator = Validator::make($finding_data, CheckupFinding::$rules);
              if ($validator->fails()) return Redirect::back()->withErrors($validator);
              CheckupFinding::create( $finding_data );
          }
      }catch(ValidationException $e)
      {
          return Redirect::back();
      }

      //vaccination entry

      $vaccination = [];
      $vaccination['checkup_id']     = $checkup->id;

      for($i = 0; $i < count($request->vaccines); $i++) {
        if(isset($request->$i)) {
          for( $j = 0; $j < count($request->$i); $j++) {
            $vaccination['vaccine_id']  = $i;
            $vaccination['dose_number'] = $request->$i[$j];

            $validator = Validator::make($vaccination, CheckupVaccination::$rules);
            if ($validator->fails()) return Redirect::back()->withErrors($validator);
            CheckupVaccination::create( $vaccination );
          }
        }
      }

      //Booster vaccine
      try {
          // add checkup_diseases
          $boosters_data['checkup_id']     = $checkup->id;
          for($i = 0; $i < count($request->boosters); $i++) {
              $boosters_data['finding']  = $request->boosters[$i];
              $validator = Validator::make($boosters_data, Booster::$rules);
              if ($validator->fails()) return Redirect::back()->withErrors($validator);
              Booster::create( $boosters_data );
          }
      }catch(ValidationException $e)
      {
          return Redirect::back();
      }

      DB::commit();
    	return view('admin.checkups.add_success');
    }

    public function editCheckup($checkup_id) {
      $checkup = Checkup::findOrfail($checkup_id);
      $checkup_diseases = CheckupDisease::where('checkup_id', $checkup_id)->get();
      $checkup_findings = CheckupFinding::where('checkup_id', $checkup_id)->get();
      $checkup_vaccinations = CheckupVaccination::where('checkup_id', $checkup_id)->get();
      $boosters         = Booster::where('checkup_id', $checkup_id)->get();

      $vaccines       = Vaccine::get();
      $diseases       = Disease::whereStatus(1)->orderBy('name', 'DESC')->pluck('name', 'id');
      $sub_diseases   = SubDisease::whereStatus(1)->orderBy('name', 'DESC')->get();

      return view('admin.checkups.edit', compact('checkup', 'diseases', 'sub_diseases', 'vaccines', 'checkup_diseases', 'checkup_findings', 'checkup_vaccinations', 'boosters'));
    }
 }
