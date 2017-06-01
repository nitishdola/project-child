<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth, DB, Redirect,Validator,Input,Crypt,Hash; 
use App\StudentAdmin, App\Student,App\SchoolClass,App\Disease, App\School, App\Checkup, App\CheckupVaccination;

class StudentAdminController extends Controller
{
    public function __construct(){
        $this->middleware('student_admin');
        $this->student_id = Auth::guard('student_admin')->user()->student_id;
    }

    public function index(Request $request) {
        $student_id     = $this->student_id;
        $student_info   = Student::whereId($student_id)->with('blood_group', 'school')->first();
        
        $last_checkup   = Checkup::where('student_id', $student_id)->orderBy('checkup_date', 'DESC')->first();

        $all_checkups   = Checkup::where('student_id', $student_id)->with( 'checkup_disease', 'checkup_disease.disease', 'checkup_disease.sub_disease', 'checkup_disease.sub_disease.disease')
        ->orderBy('checkup_date', 'DESC')->get();

        //dd($all_checkups);
        $checkup_data = [];
        foreach($all_checkups as $k => $v) {
            $checkupId = $v->id;

            $checkup_data[$k]['checkup_id'] = $checkupId;
            $checkup_data[$k]['checkup_date'] = $v->checkup_date;

            $checkup_data[$k]['height'] = $v->height;
            $checkup_data[$k]['weight'] = $v->weight;

            $checkup_data[$k]['remarks'] = $v->remarks;

            
            //find all disease
            $diseases = DB::table('checkup_diseases')->where('checkup_id', $checkupId)->get();
            
            foreach($diseases as $kd => $vd) {
                $disease_info = DB::table('diseases')->whereId($vd->disease_id)->first();
                $checkup_data[$k]['disease_name'][$kd] = $disease_info->name;

                $sub_disease_info = DB::table('sub_diseases')->whereId($vd->sub_disease_id)->first();
                $checkup_data[$k]['sub_disease_name'][$kd] = $sub_disease_info->name;

                $checkup_data[$k]['description'][$kd] = $v->description;
            }
        }
        //dd($checkup_data);
        if(count($last_checkup)):
            $diseases = DB::table('checkup_diseases')
                ->join('checkups', 'checkups.id', '=', 'checkup_diseases.checkup_id')
                ->join('students', 'students.id', '=', 'checkups.student_id')
                ->join('diseases', 'diseases.id',  '=',  'checkup_diseases.disease_id')
                ->join('sub_diseases', 'sub_diseases.id',  '=',  'checkup_diseases.sub_disease_id')
                ->select('diseases.id as diseasesId','diseases.name as diseasesName', 'sub_diseases.name as subDiseaseName', 'checkup_diseases.description as description')
                ->where('students.id', $student_id)
                ->where('checkup_id', $last_checkup->id)
                ->orderBy('checkups.checkup_date', 'DESC')
                ->get();

            $vaccinations   = CheckupVaccination::where('checkup_id', $last_checkup->id)->with('vaccine')->get();
            //$boosters       = Booster::where('checkup_id', $last_checkup->id)->with('vaccine')->get();  
        endif;
        return view('student_admin.report_view', compact('student_info', 'diseases', 'last_checkup', 'first_disease', 'vaccinations', 'all_checkups', 'checkup_data'));
    }

    public function changePassword() {
        return view('student_admin.change_password');
    }

    public function updatePassword(Request $request) {
        $this->validate($request, [
            'old' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
 
        $user = StudentAdmin::find($this->student_id);
        $hashedPassword = $user->password;
        

        if (Hash::check($request->old, $hashedPassword)) {
            //Change the password
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();
 
            $request->session()->flash('success', 'Your password has been changed.');
 
            return back();
        }
 
        $request->session()->flash('failure', 'Your password has not been changed.');
 
        return back();
    }

    public function createStudentPassword() {
        $students = DB::table('students')->where('status',1)->get();
        $data = [];

        foreach($students as $k => $v) {
            if($v->id > 16607):
            $data['student_id'] = $v->id;
            $data['username']   = $v->registration_number;
            $data['password']   = bcrypt($v->registration_number);

            if(StudentAdmin::create($data)) {
                echo '<p>Created password '.$v->registration_number.'</p>';
            }else{
                echo '<p>Could not create password '.$v->registration_number.'</p>';
            }
            endif;
        }
    }
}
