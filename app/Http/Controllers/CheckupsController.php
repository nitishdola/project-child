<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth,Crypt,Redirect,DB,Validator;
use App\Student, App\Disease, App\SubDisease,App\CheckupDisease,App\CheckupFinding,App\Checkup;

class CheckupsController extends Controller
{
    public function addCheckup() {
    	$students   = Student::select(DB::raw("CONCAT(name,' (', registration_number, ')') AS name, id"))->pluck('name', 'id');

    	$diseases   	= Disease::whereStatus(1)->orderBy('name', 'DESC')->pluck('name', 'id');
    	$sub_diseases   = SubDisease::whereStatus(1)->orderBy('name', 'DESC')->get();

    	return view('admin.checkups.add', compact('students', 'diseases', 'sub_diseases'));
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
      DB::commit();
    	return view('admin.checkups.add_success');

    	/*$message = '';
        DB::beginTransaction();

        try {
            // add pg location
            $data = $request->all();
            $data['rent_admin_id'] = Auth::guard('rent_admin')->user()->id;

            $validator = Validator::make($data, PgLocation::$rules);
            if ($validator->fails()) return Redirect::back()->withErrors($validator);
            $pg_location = PgLocation::create( $data );
        }catch(ValidationException $e)
        {
            return Redirect::back();
        }

        //add amenities
        try {
            //loop through the items entered

            $amm_data['pg_location_id']    	= $pg_location->id;
            for($i = 0; $i < count($request->amenities); $i++) {
                $amm_data['amenity_id']            = $request->amenities[$i];
                $validator = Validator::make($amm_data, PgLocationAmenity::$rules);
                if ($validator->fails()) return Redirect::back()->withErrors($validator);
                PgLocationAmenity::create( $amm_data );
            }
        } catch(ValidationException $e)
        {
            return Redirect::back();
        }

        //add images
        try {
            //loop through the items entered
            $destination_path = public_path('uploads/pg_images/'.date('Y').'/'.$pg_location->id);
            $img_data['pg_location_id']    	= $pg_location->id;
            	//upload image
        	if ($request->hasFile('image')) {

        		for($i = 0; $i < count($request->image); $i++) {
					if ($request->file('image')[$i]->isValid()) {
					  	$fileName = 'pg-'.md5(uniqid()).'.'.$request->file('image')[$i]->getClientOriginalExtension();
					  	$request->file('image')[$i]->move($destination_path, $fileName);
					  	$img_data['image_location'] = 'pg_images/'.date('Y').'/'.$pg_location->id.'/'.$fileName;

					  	$validator = Validator::make($img_data, PgLocationImage::$rules);
                		if ($validator->fails()) return Redirect::back()->withErrors($validator);
                		PgLocationImage::create( $img_data );
					}
				}
            }
        } catch(ValidationException $e)
        {
            return Redirect::back();
        }

         //add rooms
        try {
            //loop through the items entered
            $room_data['pg_location_id']    	= $pg_location->id;

            for($i = 0; $i < count($request->room_type_id); $i++) {

            	if(isset($request->room_type_id[$i]) && isset($request->rent_per_bed[$i])) {
            		if(($request->room_type_id[$i] ) != '' && ($request->rent_per_bed[$i] != '')) {
            			$room_data['room_type_id']            = $request->room_type_id[$i];
		                $room_data['rent_per_bed']            = $request->rent_per_bed[$i];
		                $validator = Validator::make($room_data, PgRoom::$rules);
		                if ($validator->fails()) return Redirect::back()->withErrors($validator);
		                PgRoom::create( $room_data );
            		}
	            }
            }
        } catch(ValidationException $e)
        {
            return Redirect::back();
        }

        // Commit the queries!
        DB::commit();

        $message = 'Landmark added succssfully !';
        $class   = 'note-success';
        return Redirect::route('landmark.index')->with(['message' => $message, 'note-class' => $class]);
        */
    }
 }
