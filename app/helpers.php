<?php

function getCurrentSchoolName() { 
	if(Auth::guard('school_admin')->user()) {
		$school_id = Auth::guard('school_admin')->user()->school_id;

		return DB::table('schools')->where('id', $school_id)->select('name')->first()->name;
	}
	return false;
}


function getCurrentStudentName() { 
	if(Auth::guard('student_admin')->user()) {
		$student_id = Auth::guard('student_admin')->user()->student_id;

		return DB::table('students')->where('id', $student_id)->select('first_name')->first()->first_name;
	}
	return false;
}

function calculateBMI($dob,$height,$weight,$gender) {
	$from = new \DateTime($dob);
    $to   = new \DateTime('today');
    $age_in_years = $from->diff($to)->y;
    $bmi_data = [];
    $bmi_data['error'] 	= '';
    $bmi_data['bmi'] 	= '';
    $bmi_data['remarks'] 	= '';

    $error_data = 0;

    //calculate BMI
    if( $height != '' && $height != 0) {
		if($weight != '' && $weight != 0) {
			//convert height to meters
			$height = $height/100;
			//calculate BMI
			$bmi = $weight / ( $height*$height );
			$bmi_data['bmi'] = $bmi;
		}else{
			$error_data = 1;
			$bmi_data['error'] = 'Incorrect weight';
		}
	}else{
		$error_data = 1;
		$bmi_data['error'] = 'Incorrect height';
	}

    
    //calculate BMI for male
    if(!$error_data) {
		if($gender === 'male') {
			if($age_in_years >= 5 && $age_in_years < 6) {   //age group 5-6
				if($bmi >= 10 && $bmi < 12.2) {
					$bmi_data['remarks'] = 'Severely Thin';	
				}else if($bmi >= 12.2 && $bmi < 13) {
					$bmi_data['remarks'] = 'Thin';	
				}else if($bmi >= 13 && $bmi < 16.5) {
					$bmi_data['remarks'] = 'Normal';	
				}else if($bmi >= 16.5 && $bmi < 18.5 ) {
					$bmi_data['remarks'] = 'Overweight';	
				}else if($bmi >= 18.5) {
					$bmi_data['remarks'] = 'Obese';	
				}
			}else if( $age_in_years >= 6 && $age_in_years < 7 ) { //age group 6 to 7
				if($bmi >= 10 && $bmi < 12.4) {
					$bmi_data['remarks'] = 'Severely Thin';	
				}else if($bmi >= 12.4 && $bmi < 13.1) {
					$bmi_data['remarks'] = 'Thin';	
				}else if($bmi >= 13.1 && $bmi < 17) {
					$bmi_data['remarks'] = 'Normal';	
				}else if($bmi >= 17 && $bmi < 18.8 ) {
					$bmi_data['remarks'] = 'Overweight';	
				}else if($bmi >= 18.8) {
					$bmi_data['remarks'] = 'Obese';	
				}
			}else if( $age_in_years >= 7 && $age_in_years < 8 ) { //age group 7 to 8
				if($bmi >= 10 && $bmi < 12.5) {
					$bmi_data['remarks'] = 'Severely Thin';	
				}else if($bmi >= 12.5 && $bmi < 13.2) {
					$bmi_data['remarks'] = 'Thin';	
				}else if($bmi >= 13.2 && $bmi < 17.4) {
					$bmi_data['remarks'] = 'Normal';	
				}else if($bmi >= 17.4 && $bmi < 19.4 ) {
					$bmi_data['remarks'] = 'Overweight';	
				}else if($bmi >= 19.4) {
					$bmi_data['remarks'] = 'Obese';	
				}
			}else if( $age_in_years >= 8 && $age_in_years < 9 ) { //age group 8 to 9
				if($bmi >= 10 && $bmi < 12.6) {
					$bmi_data['remarks'] = 'Severely Thin';	
				}else if($bmi >= 12.6 && $bmi < 13.4) {
					$bmi_data['remarks'] = 'Thin';	
				}else if($bmi >= 13.4 && $bmi < 17.5) {
					$bmi_data['remarks'] = 'Normal';	
				}else if($bmi >= 17.5 && $bmi < 20 ) {
					$bmi_data['remarks'] = 'Overweight';	
				}else if($bmi >= 20) {
					$bmi_data['remarks'] = 'Obese';	
				}
			}else if( $age_in_years >= 9 && $age_in_years < 10 ) { //age group 9 to 10
				if($bmi >= 10 && $bmi < 12.8) {
					$bmi_data['remarks'] = 'Severely Thin';	
				}else if($bmi >= 12.8 && $bmi < 13.5) {
					$bmi_data['remarks'] = 'Thin';	
				}else if($bmi >= 13.5 && $bmi < 18.2) {
					$bmi_data['remarks'] = 'Normal';	
				}else if($bmi >= 18.2 && $bmi < 21 ) {
					$bmi_data['remarks'] = 'Overweight';	
				}else if($bmi >= 21) {
					$bmi_data['remarks'] = 'Obese';	
				}
			}else if( $age_in_years >= 10 && $age_in_years < 11 ) { //age group 10 to 11
				if($bmi >= 10 && $bmi < 13) {
					$bmi_data['remarks'] = 'Severely Thin';	
				}else if($bmi >= 13 && $bmi < 14) {
					$bmi_data['remarks'] = 'Thin';	
				}else if($bmi >= 14 && $bmi < 19) {
					$bmi_data['remarks'] = 'Normal';	
				}else if($bmi >= 19 && $bmi < 22 ) {
					$bmi_data['remarks'] = 'Overweight';	
				}else if($bmi >= 22) {
					$bmi_data['remarks'] = 'Obese';	
				}
			}else if( $age_in_years >= 11 && $age_in_years < 12 ) { //age group 11 to 12
				if($bmi >= 10 && $bmi < 13.2) {
					$bmi_data['remarks'] = 'Severely Thin';	
				}else if($bmi >= 13.2 && $bmi < 14.2) {
					$bmi_data['remarks'] = 'Thin';	
				}else if($bmi >= 14.2 && $bmi < 19.5) {
					$bmi_data['remarks'] = 'Normal';	
				}else if($bmi >= 19.5 && $bmi < 23 ) {
					$bmi_data['remarks'] = 'Overweight';	
				}else if($bmi >= 23) {
					$bmi_data['remarks'] = 'Obese';	
				}
			}else if( $age_in_years >= 12 && $age_in_years < 13 ) { //age group 12 to 13
				if($bmi >= 10 && $bmi < 13.5) {
					$bmi_data['remarks'] = 'Severely Thin';	
				}else if($bmi >= 13.5 && $bmi < 14.4) {
					$bmi_data['remarks'] = 'Thin';	
				}else if($bmi >= 14.4 && $bmi < 20.5) {
					$bmi_data['remarks'] = 'Normal';	
				}else if($bmi >= 20.5 && $bmi < 24.2 ) {
					$bmi_data['remarks'] = 'Overweight';	
				}else if($bmi >= 24.2) {
					$bmi_data['remarks'] = 'Obese';	
				}
			}else if( $age_in_years >= 13 && $age_in_years < 14 ) { //age group 13 to 14
				if($bmi >= 10 && $bmi < 14) {
					$bmi_data['remarks'] = 'Severely Thin';	
				}else if($bmi >= 14 && $bmi < 15.2) {
					$bmi_data['remarks'] = 'Thin';	
				}else if($bmi >= 15.2 && $bmi < 23.4) {
					$bmi_data['remarks'] = 'Normal';	
				}else if($bmi >= 23.4 && $bmi < 25.4 ) {
					$bmi_data['remarks'] = 'Overweight';	
				}else if($bmi >= 25.4) {
					$bmi_data['remarks'] = 'Obese';	
				}
			}else if( $age_in_years >= 14 && $age_in_years < 15 ) { //age group 14 to 15
				if($bmi >= 10 && $bmi < 14.5) {
					$bmi_data['remarks'] = 'Severely Thin';	
				}else if($bmi >= 14.5 && $bmi < 15.6) {
					$bmi_data['remarks'] = 'Thin';	
				}else if($bmi >= 15.6 && $bmi < 22.4) {
					$bmi_data['remarks'] = 'Normal';	
				}else if($bmi >= 22.4 && $bmi < 26.5 ) {
					$bmi_data['remarks'] = 'Overweight';	
				}else if($bmi >= 26.5) {
					$bmi_data['remarks'] = 'Obese';	
				}
			}else if( $age_in_years >= 15 && $age_in_years < 16 ) { //age group 15 to 16
				if($bmi >= 10 && $bmi < 15) {
					$bmi_data['remarks'] = 'Severely Thin';	
				}else if($bmi >= 15 && $bmi < 16.4) {
					$bmi_data['remarks'] = 'Thin';	
				}else if($bmi >= 16.4 && $bmi < 23.2) {
					$bmi_data['remarks'] = 'Normal';	
				}else if($bmi >= 23.2 && $bmi < 27.5 ) {
					$bmi_data['remarks'] = 'Overweight';	
				}else if($bmi >= 27.5) {
					$bmi_data['remarks'] = 'Obese';	
				}
			}else if( $age_in_years >= 16 && $age_in_years < 17 ) { //age group 16 to 17
				if($bmi >= 10 && $bmi < 15.4) {
					$bmi_data['remarks'] = 'Severely Thin';	
				}else if($bmi >= 15.4 && $bmi < 16.6) {
					$bmi_data['remarks'] = 'Thin';	
				}else if($bmi >= 16.6 && $bmi < 24) {
					$bmi_data['remarks'] = 'Normal';	
				}else if($bmi >= 24 && $bmi < 28.4 ) {
					$bmi_data['remarks'] = 'Overweight';	
				}else if($bmi >= 28.4) {
					$bmi_data['remarks'] = 'Obese';	
				}
			}else if( $age_in_years >= 17 && $age_in_years < 18 ) { //age group 17 to 18
				if($bmi >= 10 && $bmi < 15.5) {
					$bmi_data['remarks'] = 'Severely Thin';	
				}else if($bmi >= 15.5 && $bmi < 17.2) {
					$bmi_data['remarks'] = 'Thin';	
				}else if($bmi >= 17.2 && $bmi < 24.5) {
					$bmi_data['remarks'] = 'Normal';	
				}else if($bmi >= 24.5 && $bmi < 29 ) {
					$bmi_data['remarks'] = 'Overweight';	
				}else if($bmi >= 29) {
					$bmi_data['remarks'] = 'Obese';	
				}
			}else if( $age_in_years >= 18 && $age_in_years < 19 ) { //age group 18 to 19
				if($bmi >= 10 && $bmi < 15.6) {
					$bmi_data['remarks'] = 'Severely Thin';	
				}else if($bmi >= 15.6 && $bmi < 17.5) {
					$bmi_data['remarks'] = 'Thin';	
				}else if($bmi >= 17.5 && $bmi < 25.4) {
					$bmi_data['remarks'] = 'Normal';	
				}else if($bmi >= 25.4 && $bmi < 29.5 ) {
					$bmi_data['remarks'] = 'Overweight';	
				}else if($bmi >= 29.5) {
					$bmi_data['remarks'] = 'Obese';	
				}
			}else{
				$bmi_data['remarks'] = 'Age Group Not Found';
			}
		} else if($gender === 'female') {
			if($age_in_years >= 5 && $age_in_years < 6) {   //age group 5-6
				if($bmi >= 10 && $bmi < 11.6) {
					$bmi_data['remarks'] = 'Severely Thin';	
				}else if($bmi >= 11.6 && $bmi < 12.6) {
					$bmi_data['remarks'] = 'Thin';	
				}else if($bmi >= 12.6 && $bmi < 15.2) {
					$bmi_data['remarks'] = 'Normal';	
				}else if($bmi >= 15.2 && $bmi < 19 ) {
					$bmi_data['remarks'] = 'Overweight';	
				}else if($bmi >= 19) {
					$bmi_data['remarks'] = 'Obese';	
				}
			}else if( $age_in_years >= 6 && $age_in_years < 7 ) { //age group 6 to 7
				if($bmi >= 10 && $bmi < 11.6) {
					$bmi_data['remarks'] = 'Severely Thin';	
				}else if($bmi >= 11.6 && $bmi < 12.6) {
					$bmi_data['remarks'] = 'Thin';	
				}else if($bmi >= 12.6 && $bmi < 15.4) {
					$bmi_data['remarks'] = 'Normal';	
				}else if($bmi >= 15.4 && $bmi < 19.5 ) {
					$bmi_data['remarks'] = 'Overweight';	
				}else if($bmi >= 19.5) {
					$bmi_data['remarks'] = 'Obese';	
				}
			}else if( $age_in_years >= 7 && $age_in_years < 8 ) { //age group 7 to 8
				if($bmi >= 10 && $bmi < 11.8) {
					$bmi_data['remarks'] = 'Severely Thin';	
				}else if($bmi >= 11.8 && $bmi < 12.8) {
					$bmi_data['remarks'] = 'Thin';	
				}else if($bmi >= 12.8 && $bmi < 15.5) {
					$bmi_data['remarks'] = 'Normal';	
				}else if($bmi >= 15.5 && $bmi < 20.2 ) {
					$bmi_data['remarks'] = 'Overweight';	
				}else if($bmi >= 20.2) {
					$bmi_data['remarks'] = 'Obese';	
				}
			}else if( $age_in_years >= 8 && $age_in_years < 9 ) { //age group 8 to 9
				if($bmi >= 10 && $bmi < 12) {
					$bmi_data['remarks'] = 'Severely Thin';	
				}else if($bmi >= 12 && $bmi < 13) {
					$bmi_data['remarks'] = 'Thin';	
				}else if($bmi >= 13 && $bmi < 16) {
					$bmi_data['remarks'] = 'Normal';	
				}else if($bmi >= 16 && $bmi < 21 ) {
					$bmi_data['remarks'] = 'Overweight';	
				}else if($bmi >= 21) {
					$bmi_data['remarks'] = 'Obese';	
				}
			}else if( $age_in_years >= 9 && $age_in_years < 10 ) { //age group 8 to 9
				if($bmi >= 10 && $bmi < 12.4) {
					$bmi_data['remarks'] = 'Severely Thin';	
				}else if($bmi >= 12.4 && $bmi < 13.5) {
					$bmi_data['remarks'] = 'Thin';	
				}else if($bmi >= 13.5 && $bmi < 16.4) {
					$bmi_data['remarks'] = 'Normal';	
				}else if($bmi >= 16.4 && $bmi < 22 ) {
					$bmi_data['remarks'] = 'Overweight';	
				}else if($bmi >= 22) {
					$bmi_data['remarks'] = 'Obese';	
				}
			}else if( $age_in_years >= 10 && $age_in_years < 11 ) { //age group 10 to 11
				if($bmi >= 10 && $bmi < 12.5) {
					$bmi_data['remarks'] = 'Severely Thin';	
				}else if($bmi >= 12.5 && $bmi < 13.6) {
					$bmi_data['remarks'] = 'Thin';	
				}else if($bmi >= 13.6 && $bmi < 17) {
					$bmi_data['remarks'] = 'Normal';	
				}else if($bmi >= 17 && $bmi < 22.6 ) {
					$bmi_data['remarks'] = 'Overweight';	
				}else if($bmi >= 22.6) {
					$bmi_data['remarks'] = 'Obese';	
				}
			}else if( $age_in_years >= 11 && $age_in_years < 12 ) { //age group 11 to 12
				if($bmi >= 10 && $bmi < 13) {
					$bmi_data['remarks'] = 'Severely Thin';	
				}else if($bmi >= 13 && $bmi < 14.2) {
					$bmi_data['remarks'] = 'Thin';	
				}else if($bmi >= 14.2 && $bmi < 17.6) {
					$bmi_data['remarks'] = 'Normal';	
				}else if($bmi >= 17.6 && $bmi < 24.4 ) {
					$bmi_data['remarks'] = 'Overweight';	
				}else if($bmi >= 24.4) {
					$bmi_data['remarks'] = 'Obese';	
				}
			}else if( $age_in_years >= 12 && $age_in_years < 13 ) { //age group 12 to 13
				if($bmi >= 10 && $bmi < 13.4) {
					$bmi_data['remarks'] = 'Severely Thin';	
				}else if($bmi >= 13.4 && $bmi < 14.6) {
					$bmi_data['remarks'] = 'Thin';	
				}else if($bmi >= 14.6 && $bmi < 18.5) {
					$bmi_data['remarks'] = 'Normal';	
				}else if($bmi >= 18.5 && $bmi < 25.6 ) {
					$bmi_data['remarks'] = 'Overweight';	
				}else if($bmi >= 25.6) {
					$bmi_data['remarks'] = 'Obese';	
				}
			}else if( $age_in_years >= 13 && $age_in_years < 14 ) { //age group 13 to 14
				if($bmi >= 10 && $bmi < 13.8) {
					$bmi_data['remarks'] = 'Severely Thin';	
				}else if($bmi >= 13.8 && $bmi < 15.4) {
					$bmi_data['remarks'] = 'Thin';	
				}else if($bmi >= 15.4 && $bmi < 19.4) {
					$bmi_data['remarks'] = 'Normal';	
				}else if($bmi >= 19.4 && $bmi < 26.8 ) {
					$bmi_data['remarks'] = 'Overweight';	
				}else if($bmi >= 26.8) {
					$bmi_data['remarks'] = 'Obese';	
				}
			}else if( $age_in_years >= 14 && $age_in_years < 15 ) { //age group 14 to 15
				if($bmi >= 10 && $bmi < 14.2) {
					$bmi_data['remarks'] = 'Severely Thin';	
				}else if($bmi >= 14.2 && $bmi < 15.6) {
					$bmi_data['remarks'] = 'Thin';	
				}else if($bmi >= 15.6 && $bmi < 19.8) {
					$bmi_data['remarks'] = 'Normal';	
				}else if($bmi >= 19.8 && $bmi < 27.8 ) {
					$bmi_data['remarks'] = 'Overweight';	
				}else if($bmi >= 27.8) {
					$bmi_data['remarks'] = 'Obese';	
				}
			}else if( $age_in_years >= 15 && $age_in_years < 16 ) { //age group 15 to 16
				if($bmi >= 10 && $bmi < 14.5) {
					$bmi_data['remarks'] = 'Severely Thin';	
				}else if($bmi >= 14.5 && $bmi < 16) {
					$bmi_data['remarks'] = 'Thin';	
				}else if($bmi >= 16 && $bmi < 20.5) {
					$bmi_data['remarks'] = 'Normal';	
				}else if($bmi >= 20.5 && $bmi < 28.5 ) {
					$bmi_data['remarks'] = 'Overweight';	
				}else if($bmi >= 28.5) {
					$bmi_data['remarks'] = 'Obese';	
				}
			}else if( $age_in_years >= 16 && $age_in_years < 17 ) { //age group 16 to 17
				if($bmi >= 10 && $bmi < 14.6) {
					$bmi_data['remarks'] = 'Severely Thin';	
				}else if($bmi >= 14.6 && $bmi < 16.3) {
					$bmi_data['remarks'] = 'Thin';	
				}else if($bmi >= 16.3 && $bmi < 20.8) {
					$bmi_data['remarks'] = 'Normal';	
				}else if($bmi >= 20.8 && $bmi < 29.2 ) {
					$bmi_data['remarks'] = 'Overweight';	
				}else if($bmi >= 29.2) {
					$bmi_data['remarks'] = 'Obese';	
				}
			}else if( $age_in_years >= 17 && $age_in_years < 18 ) { //age group 17 to 18
				if($bmi >= 10 && $bmi < 14.7) {
					$bmi_data['remarks'] = 'Severely Thin';	
				}else if($bmi >= 14.7 && $bmi < 16.4) {
					$bmi_data['remarks'] = 'Thin';	
				}else if($bmi >= 16.4 && $bmi < 21.2) {
					$bmi_data['remarks'] = 'Normal';	
				}else if($bmi >= 21.2 && $bmi < 29.4 ) {
					$bmi_data['remarks'] = 'Overweight';	
				}else if($bmi >= 29.4) {
					$bmi_data['remarks'] = 'Obese';	
				}
			}else if( $age_in_years >= 18 && $age_in_years < 19 ) { //age group 18 to 19
				if($bmi >= 10 && $bmi < 14.7) {
					$bmi_data['remarks'] = 'Severely Thin';	
				}else if($bmi >= 14.7 && $bmi < 16.5) {
					$bmi_data['remarks'] = 'Thin';	
				}else if($bmi >= 16.5 && $bmi < 21.4) {
					$bmi_data['remarks'] = 'Normal';	
				}else if($bmi >= 21.4 && $bmi < 29.6 ) {
					$bmi_data['remarks'] = 'Overweight';	
				}else if($bmi >= 29.6) {
					$bmi_data['remarks'] = 'Obese';	
				}
			}else {
				$bmi_data['error'] = 'Age Group Not Found';
			}
		}
	}

    return $bmi_data;
}