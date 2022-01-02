<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Services;
use App\Models\Child_registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function view_my_service(){
        $page_name = 'My Home service';
        $service = DB::table('services')
            ->join('vaccines','vaccines.id', '=', 'services.vacID')
            ->join('child_registrations','child_registrations.id','=','services.childID')
            ->select('child_registrations.id as child_id','child_registrations.first_name as childFirstName', 'child_registrations.last_name as childLastName', 'vaccines.id as vaccineID', 'vaccines.vaccine_name', 'services.dose_number', 'services.id as Invoice_id', 'services.address', 'services.takenDate')
            ->where('userID','=', Auth::user()->id)
            ->get();

        return view('user.services.view_service', compact('page_name','service'));
    }
    public function get_request_form(){
        $page_name = 'Send Request For Take Home service';
        $child = DB::table('child_registrations')
            ->where('user_id','=', Auth::user()->id)
            ->get();

        $vaccine = DB::table('reg_vaccines')
            ->join('vaccines','vaccines.id','=','reg_vaccines.vaccine_id')
            ->select('vaccines.id as vacID', 'vaccines.vaccine_name', 'vaccines.number_of_dose', 'vaccines.break')
            ->where('reg_vaccines.user_id','=', Auth::user()->id)
            ->get();
        return view('user.services.request_service', compact('page_name','child','vaccine'));
    }

    public function pay_now($id){
        $page_name = 'Pay Now';
        $item = Services::find($id);
        return view('user.services.pay_now', compact('page_name','item'));
    }

    public function RequestService(Request $request){
        $this->validate($request, [
            'dose_number' => 'required',
            'takenDate'   => 'required'
        ],[
            'dose_number.required' => 'Please Enter Dose Number',
            'takenDate.required'   => 'Please Enter Current Dose Taken Date'
        ]);

        $invoice = rand(100,10000);
        $service = new Services();
        $service->childID        = $request->childID;
        $service->userID         = $request->userID;
        $service->fee            = $request->fee;
        $service->phone          = $request->phone;
        $service->vacID          = $request->vacID;
        $service->dose_number    = $request->dose_number;
        $service->takenDate      = $request->takenDate;
        $service->address        = $request->address;
        $service->invoice_number = $invoice;

        $service->save();
        $id = $service->id;
        return redirect()->route('user.services.pay_now', compact('id'))->with('success', 'Registration success');

    }
    public function next_pay($id){
        $page_name = 'Pay Now';
        $item = Services::find($id);

        return view('user.services.next_pay', compact('page_name','item'));
    }

    public function make_payment(Request $request, $id){
        $this->validate($request,[
            'account_number' => 'required',
        ],[
            'account_number.required' => 'Enter Phone Number',
        ]);

        $code = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0,6);

        $make_payment = Services::find($id);

        $make_payment->account_number     = $request->account_number;
        $make_payment->pay_by             = 'Bkash';
        $make_payment->transaction_number = $code;

        $make_payment->save();

        return redirect()->route('user.services.view_my_service')->with('success', 'Request Sent Successful');
    }

    public function details($id){
        $page_name = 'My Application Details';
        $application = DB::table('services')
            ->join('users','users.id', '=', 'services.userID')
            ->join('vaccines','vaccines.id', '=', 'services.vacID')
            ->join('child_registrations','child_registrations.id','=','services.childID')
            ->where('services.id','=', $id)
            ->get();

        return view('user.services.full_details', compact('page_name','application'));
    }

}
