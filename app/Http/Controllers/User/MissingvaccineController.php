<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MissingVaccine;
use App\Models\Child_registration;
use App\Models\Vaccine;
use App\Models\User;
use App\Models\RegVaccine;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class MissingvaccineController extends Controller
{
    public function get_reg_form($id){
        $page_name  = 'Registration Missing Vaccine';
        $child_id = Child_registration::find($id);
        $hospital = DB::table('hospitals')
            ->where('hospitals.address','LIKE','%'. Auth::user()->address .'%')
            ->get();

        $vaccine = DB::table('reg_vaccines')
            ->join('vaccines','vaccines.id','=','reg_vaccines.vaccine_id')
            ->select('vaccines.id as vacID', 'vaccines.vaccine_name', 'vaccines.number_of_dose', 'vaccines.break')
            ->where('reg_vaccines.user_id','=', Auth::user()->id)
            ->get();

        return view('user.missing_vaccine.reg', compact('child_id','page_name', 'vaccine', 'hospital'));
    }

    public function pay_now($id){
        $page_name = 'Pay Now';
        $item = MissingVaccine::find($id);

        return view('user.missing_vaccine.pay_now', compact('page_name','item'));
    }
    public function reg_missingVaccine(Request $request){
        $this->validate($request, [
            'missing_dose' => 'required'
        ],[
            'missing_dose.required' => 'Please Enter you missing Dosede'
        ]);

        $invoice = rand(100,10000);
        $missing = new MissingVaccine();
        $missing->childID        = $request->childID;
        $missing->userID         = $request->userID;
        $missing->dose_fee       = $request->dose_fee;
        $missing->phone          = $request->phone;
        $missing->vacID          = $request->vacID;
        $missing->missing_dose   = $request->missing_dose;
        $missing->hospital_name  = $request->hospital_name;
        $missing->invoice_number = $invoice;

        $missing->save();
        $id = $missing->id;

//        dd($id);
        return redirect()->route('user.missing_vaccine.pay_now', compact('id'))->with('success', 'Registration success');
    }

    public function my_application(){
        $page_name = 'My Application';
        $application = DB::table('missing_vaccines')
            ->join('vaccines','vaccines.id', '=', 'missing_vaccines.vacID')
            ->join('child_registrations','child_registrations.id','=','missing_vaccines.childID')
            ->select('child_registrations.id as child_id','child_registrations.first_name as childFirstName', 'child_registrations.last_name as childLastName', 'vaccines.id as vaccineID', 'vaccines.vaccine_name', 'missing_vaccines.id as Invoice_id', 'missing_vaccines.hospital_name', 'missing_vaccines.takenDate')
            ->where('userID','=', Auth::user()->id)
            ->get();
        return view('user.missing_vaccine.application', compact('page_name','application'));
    }

    public function details($id){
        $page_name = 'My Application Details';
        $application = DB::table('missing_vaccines')
            ->join('users','users.id', '=', 'missing_vaccines.userID')
            ->join('vaccines','vaccines.id', '=', 'missing_vaccines.vacID')
            ->join('child_registrations','child_registrations.id','=','missing_vaccines.childID')
            ->where('missing_vaccines.id','=', $id)
            ->get();

        return view('user.missing_vaccine.full_details', compact('page_name','application'));
    }

    public function next_pay($id){
        $page_name = 'Pay Now';
        $item = MissingVaccine::find($id);

        return view('user.missing_vaccine.next_pay', compact('page_name','item'));
    }

    public function make_payment(Request $request, $id){
        $this->validate($request,[
            'account_number' => 'required',
        ],[
            'account_number.required' => 'Enter Phone Number',
        ]);

        $code = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0,6);

        $make_payment = MissingVaccine::find($id);

        $make_payment->account_number     = $request->account_number;
        $make_payment->pay_by             = 'Bkash';
        $make_payment->transaction_number = $code;

        $make_payment->save();

        return redirect()->route('user.missing_vaccine.my_application')->with('success', 'Registration Successful');
    }

    public function cancel_payment(){
      return view('user.vaccine_details.reg_vaccine');
    }

}
