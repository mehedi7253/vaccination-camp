<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vaccine;
use Illuminate\Support\Facades\DB;
use App\Models\Child_registration;
use App\Models\RegVaccine;

class RegVaccineController extends Controller
{
    public function get_reg_form(){
        $page_name = 'Reg Vaccine For Your Children';
        $children = DB::table('child_registrations')
            ->where('user_id', '=', Auth::user()->id)
            ->get();
        return view('user.vaccine_details.reg_vaccine', compact('page_name','children'));
    }

    public function search(Request $request)
    {
        $page_name = 'Reg Vaccine For Your Children';
        $children = DB::table('child_registrations')
            ->where('user_id', '=', Auth::user()->id)
            ->get();

        $search = $request->get('search');
        $data = DB::table('child_registrations')
            ->where('first_name', 'LIKE', "%" . $search . "%")
            ->get();

        if (count($data)>0){
            return view('user.vaccine_details.reg_vaccine',compact('page_name', 'children','data'));
        }

    }

    public function get_child_dtls(Request $request, $id){
        $page_name = 'Reg Vaccine For Your Children';
        $child = Child_registration::find($id);

        $search = $request->get('search');
        $data = DB::table('vaccines')
            ->where('age_limit', 'LIKE', "%" . $search . "%")
            ->get();

        return view('user.vaccine_details.confirm_reg', compact('page_name','child','data'));
    }

    public function reg_vaccine(Request $request){
        $this->validate($request,[
            'user_id'    => 'required',
            'child_id'   => 'required',
            'vaccine_id' => 'required'
        ]);
        foreach ($request->vaccine_id as $id => $vaccine){
            $reg             = new RegVaccine();
            $reg->user_id    = $request->user_id;
            $reg->child_id   = $request->child_id;
            $reg->vaccine_id = $request->vaccine_id [$id];
            $reg->status     = 0;
            $reg->save();
        }
        return back()->with('success', 'Registration successful');
    }

    public function view_vaccine_reg(){
        $page_name = 'Registered Vaccine';

        $reg_vaccine = DB::table('reg_vaccines')
            ->join('users','users.id','=','reg_vaccines.user_id')
            ->join('vaccines','vaccines.id','=','reg_vaccines.vaccine_id')
            ->join('child_registrations','child_registrations.id','=','reg_vaccines.child_id')
            ->select('users.id as userID','child_registrations.id as childID','child_registrations.first_name as childFirst_name', 'child_registrations.last_name as childLastName','vaccines.id as vaccineID','vaccines.vaccine_name as vaccineName','vaccines.number_of_dose as vaccineDose','reg_vaccines.id as regID','reg_vaccines.dose_taken as doseTake', 'reg_vaccines.taken_date as takeDate','reg_vaccines.status')
            ->where('reg_vaccines.user_id','=', Auth::user()->id)
            ->groupBy('childID')
            ->get();
        return view('user.vaccine_details.view_reg_vaccine', compact('page_name','reg_vaccine'));
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
        return view('user.vaccine_details.vaccine_status',compact('page_name','reg_vaccine'));
    }
    public function get_certificate($id){
        $page_name = ' Vaccination Card';
        $reg_vaccine = DB::table('reg_vaccines')
            ->join('users','users.id','=','reg_vaccines.user_id')
            ->join('vaccines','vaccines.id','=','reg_vaccines.vaccine_id')
            ->join('child_registrations','child_registrations.id','=','reg_vaccines.child_id')
            ->select('users.id as userID', 'users.email as userEmail','users.phone as userPhone','users.address as userAddress', 'child_registrations.id as childID','child_registrations.first_name as childFirst_name', 'child_registrations.last_name as childLastName','child_registrations.birth_date as birthDay', 'vaccines.id as vaccineID','vaccines.vaccine_name as vaccineName','vaccines.number_of_dose as vaccineDose','vaccines.break as Break','reg_vaccines.id as regID','reg_vaccines.dose_taken as doseTake', 'reg_vaccines.taken_date as takeDate','reg_vaccines.status', 'reg_vaccines.created_at as regDate')
            ->where('reg_vaccines.id','=', $id)
            ->get();

//        dd($reg_vaccine);
        return view('user.vaccine_details.certificate',compact('page_name','reg_vaccine'));
    }



}
