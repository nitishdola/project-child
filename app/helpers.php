<?php

function getCurrentSchoolName() { 
	if(Auth::guard('school_admin')->user()) {
		$school_id = Auth::guard('school_admin')->user()->school_id;

		return DB::table('schools')->where('id', $school_id)->select('name')->first()->name;
	}
	return false;
}