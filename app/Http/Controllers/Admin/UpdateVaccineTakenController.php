<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use App\Models\Vaccine;
use Illuminate\Support\Facades\DB;
use App\Models\Child_registration;
use App\Models\RegVaccine;

class UpdateVaccineTakenController extends Controller
{
    public function view(){
        $page_name = 'Update Vaccine Taken Status';

        $date = date('Y-m-d');
        $reg_vaccine = DB::table('reg_vaccines')
            ->join('users','users.id','=','reg_vaccines.user_id')
            ->join('vaccines','vaccines.id','=','reg_vaccines.vaccine_id')
            ->join('child_registrations','child_registrations.id','=','reg_vaccines.child_id')
            ->select('users.id as userID','child_registrations.id as childID','child_registrations.first_name as childFirst_name', 'child_registrations.last_name as childLastName','vaccines.id as vaccineID','vaccines.vaccine_name as vaccineName','vaccines.number_of_dose as vaccineDose','reg_vaccines.id as regID','reg_vaccines.dose_taken as doseTake', 'reg_vaccines.taken_date as takeDate','reg_vaccines.status')
            ->groupBy('childID')
            ->get();

        return view('admin.vaccine_take.view',compact('page_name','reg_vaccine'));
    }

    public function view_vaccine_taken_details($id){
        $page_name = 'Registered Vaccine and Current Status';

        $reg_vaccine = DB::table('reg_vaccines')
            ->join('users','users.id','=','reg_vaccines.user_id')
            ->join('vaccines','vaccines.id','=','reg_vaccines.vaccine_id')
            ->join('child_registrations','child_registrations.id','=','reg_vaccines.child_id')
            ->select('users.id as userID','child_registrations.id as childID','child_registrations.first_name as childFirst_name', 'child_registrations.last_name as childLastName','child_registrations.birth_date as birthDay', 'vaccines.id as vaccineID','vaccines.vaccine_name as vaccineName','vaccines.number_of_dose as vaccineDose','vaccines.break as Break','reg_vaccines.id as regID','reg_vaccines.dose_taken as doseTake', 'reg_vaccines.taken_date as takeDate','reg_vaccines.status')
            ->where('reg_vaccines.child_id','=', $id)
            ->get();


        return view('admin.vaccine_take.full_details',compact('page_name','reg_vaccine'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'dose_taken' => 'required',
        ]);

        $update = RegVaccine::find($id);

        $date = date('Y-m-d');
        $update->dose_taken = $request->dose_taken;
        $update->taken_date = $date;
        $update->save();

        return back();
    }
}
