<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth,Crypt,Redirect,DB,Validator;
use App\Student, App\Disease, App\SubDisease,App\CheckupDisease,App\CheckupFinding,App\Checkup, App\Vaccine, App\CheckupVaccination, App\OtherVaccine,App\FamilyHistory,App\Eyesight,App\Branch;
use App\Allergy, App\School, App\CheckupOtherVaccine,App\CheckupFamilyHistory, App\CheckupAllergy;

class CheckupsController extends Controller
{
    public function addCheckup() {
      $vaccines       = Vaccine::get();
      $other_vaccine  = OtherVaccine::whereStatus(1)->get();
      $family_history = FamilyHistory::whereStatus(1)->get();
      $other_disease_ids =  [5,6,7,8,9,10,12,13,14,15];
      $diseases       = Disease::whereStatus(1)->whereIn('id',$other_disease_ids)->orderBy('name', 'DESC')->pluck('name', 'id');

      $branches      = Branch::whereStatus(1)->pluck('name', 'id');
      //$sub_diseases   = SubDisease::whereStatus(1)->orderBy('name', 'DESC')->get();

      //$ent_sub_diseases = SubDisease::whereStatus(1)->where('disease_id',1)->orderBy('name', 'DESC')->pluck('name', 'id');

      $allergies      = Allergy::whereStatus(1)->orderBy('name', 'DESC')->pluck('name', 'id');
      $eyesights      = Eyesight::whereStatus(1)->pluck('name', 'id');
      $schools        = School::orderBy('name')->pluck('name', 'id');

      return view('admin.checkups.add', compact('diseases', 'vaccines', 'allergies', 'other_vaccine', 'family_history','eyesights','branches', 'schools'));
    }

    public function postCheckup(Request $request) { 
      DB::beginTransaction();
      $data = $request->all();

      $destination_path = public_path('uploads/checkup_images/photos/'.date('Y-m-d'));

      if ($request->hasFile('file')) {
        if ($request->file('file')->isValid()){
            $fileName = date('YmdHis').'_'.$request->student_id.'-checkup.'.$request->file('file')->getClientOriginalExtension();
            $request->file('file')->move($destination_path, $fileName);
            $data['cv_url'] = 'photos/'.date('Y-m-d').'/'.$fileName;
        }
      }

      
      $validator = Validator::make($data, Checkup::$rules);
      if ($validator->fails()) return Redirect::back()->withErrors($validator);
      $checkup = Checkup::create( $data );

      try {
          // add checkup_diseases
          $eye_subdisease_data['checkup_id']      = $checkup->id;

          //EYE disease
          if(count($request->eye_sub_disease_id)) {
            $eye_subdisease_data['disease_id'] = $request->eye_disease_id;
            for($keye = 0; $keye < count($request->eye_sub_disease_id); $keye++) {
              $eye_subdisease_data['sub_disease_id'] = $request->eye_sub_disease_id[$keye];
              if(isset($request->eye_comments[$keye]) && $request->eye_comments[$keye] != '' ) {
                $eye_subdisease_data['description'] = $request->eye_comments[$keye];
              }

              $validator = Validator::make($eye_subdisease_data, CheckupDisease::$rules);
              if ($validator->fails()) return Redirect::back()->withErrors($validator);
              CheckupDisease::create( $eye_subdisease_data );
            }
          }

          //ENT disease
          $ent_subdisease_data['checkup_id']      = $checkup->id;
          if(count($request->ent_sub_disease_id)) {
            $ent_subdisease_data['disease_id'] = 1;
            for($kent = 0; $kent < count($request->ent_sub_disease_id); $kent++) {
              $ent_subdisease_data['sub_disease_id'] = $request->ent_sub_disease_id[$kent];
              if(isset($request->ent_comments[$kent]) && $request->ent_comments[$kent] != '' ) {
                $ent_subdisease_data['description'] = $request->ent_comments[$kent];
              }

              $validator = Validator::make($ent_subdisease_data, CheckupDisease::$rules);
              if ($validator->fails()) return Redirect::back()->withErrors($validator);
              CheckupDisease::create( $ent_subdisease_data );
            }
          }
          //ENT disease
          $dental_subdisease_data['checkup_id']      = $checkup->id;
          if(count($request->dental_sub_disease_id)) {
            $dental_subdisease_data['disease_id'] = 3;
            for($kdent = 0; $kdent < count($request->dental_sub_disease_id); $kdent++) {
              $dental_subdisease_data['sub_disease_id'] = $request->dental_sub_disease_id[$kdent];
              if(isset($request->dental_comments[$kdent]) && $request->dental_comments[$kdent] != '' ) {
                $dental_subdisease_data['description'] = $request->dental_comments[$kdent];
              }

              $validator = Validator::make($dental_subdisease_data, CheckupDisease::$rules);
              if ($validator->fails()) return Redirect::back()->withErrors($validator);
              CheckupDisease::create( $dental_subdisease_data );
            }
          }
          //all other sub diseases
          $other_subdisease_data['checkup_id']      = $checkup->id;
          if(count($request->disease_id)) {
            for($koth = 0; $koth < count($request->disease_id); $koth++) {
              $other_subdisease_data['disease_id'] = $request->disease_id[$koth];
              if(isset($request->sub_disease_id[$koth])) {
                $other_subdisease_data['sub_disease_id'] = $request->sub_disease_id[$koth];
              }

              if(isset($request->paediatrics_comments[$koth])) {
                $other_subdisease_data['description'] = $request->paediatrics_comments[$koth];
              }

              $validator = Validator::make($other_subdisease_data, CheckupDisease::$rules);
              if ($validator->fails()) return Redirect::back()->withErrors($validator);
              CheckupDisease::create( $other_subdisease_data );
            }
          }
      }catch(ValidationException $e)
      {
          return Redirect::back();
      }

      //vaccination entry
      try {
        $vaccination = [];
        $vaccination['checkup_id']     = $checkup->id;

        $vaccines       = Vaccine::get();

        foreach($vaccines as $vk => $vacc) {
          $student_vaccines = $request->vaccines;
          if(isset($request->vaccines[$vacc->id]))   {
            $vaccination['vaccine_id']  = $vacc->id;
            $vaccination['dose_number'] = $request->vaccines[$vacc->id][0];
            CheckupVaccination::create($vaccination);
          }
        }
      }catch(ValidationException $e)
      {
          return Redirect::back();
      }

      //other vaccines other_vaccines
      try {
        $other_vaccination = [];
        $other_vaccination['checkup_id']     = $checkup->id;

        if(count($request->other_vaccines)) {
          for($i = 0; $i < count($request->other_vaccines); $i++) {
            $other_vaccination['other_vaccine_id']  = $request->other_vaccines[$i];
            CheckupOtherVaccine::create($other_vaccination);
          }
        }
        
      }catch(ValidationException $e)
      {
          return Redirect::back();
      }


      //other vaccines family history
      try {
        $family_history = [];
        $family_history['checkup_id']     = $checkup->id;

        if(count($request->family_histories)) {
          for($i = 0; $i < count($request->family_histories); $i++) {
            $family_history['family_history_id']  = $request->family_histories[$i];
            CheckupFamilyHistory::create($family_history);
          }
        }
        
      }catch(ValidationException $e)
      {
          return Redirect::back();
      }

      //other vaccines family history
      try {
        if($request->allergy_id) {

          $allergies = [];
          $allergies['checkup_id']          = $checkup->id;
          $allergies['allergy_id']          = $request->allergy_id;
          $allergies['allergy_category_id'] = $request->sub_alg;
          $allergies['remarks']             = $request->allergy_remarks;

          CheckupAllergy::create($allergies);
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
