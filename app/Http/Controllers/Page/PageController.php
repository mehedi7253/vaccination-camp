<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use Illuminate\Http\Request;
use App\Models\Vaccine;
use App\Models\Campgain;
use App\Models\Consultant;
use App\Models\Booking;
use App\Models\CoronaVaccine;
use App\Models\CoronaReg;
use App\Models\ContactUs;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class PageController extends Controller
{
    public function vaccine(){

        $vaccine = Vaccine::all();
        return view('pages.vaccine',compact('vaccine'));
    }
    public function vaccine_dtls($id){
        $vaccine_details = Vaccine::find($id);
        $get_all = DB::table('merit_demerits')
            ->join('vaccines', 'vaccines.id', '=', 'merit_demerits.vaccine_id')
            ->select('merit_demerits.id as meritID','vaccines.id as vaccineID', 'vaccines.vaccine_name', 'merit_demerits.merit_demerit', 'merit_demerits.description')
            ->where('vaccines.id', '=', $id)
            ->get();
        return view('pages.single_vaccine', compact('vaccine_details', 'get_all'));
    }

    public function campaign(){
        $campaign = Campgain::all();
        return view('pages.campaign', compact('campaign'));
    }

    public function campgain_details($id){
        $campgains = Campgain::find($id);
        return view('pages.campgain_details', compact('campgains'));
    }

    public function consultant(){
        $consultant = Consultant::all();
        return view('pages.consultant', compact('consultant'));
    }
    public function hospital(){
        $hospital = Hospital::all();

        if (Auth::check()){
            $hospital_address = DB::table('hospitals')
                ->where('hospitals.address','LIKE','%'. Auth::user()->address .'%')
                ->get();
            return view('pages.hospital', compact( 'hospital_address'));

        }

        return view('pages.hospital', compact('hospital'));
    }
    public function get_hospital_data($id){
        $page_name = 'Hospital Data';
        $hospital  = Hospital::find($id);
        $data = DB::table('hospital_vaccines')
            ->join('vaccines', 'vaccines.id','=','hospital_vaccines.vaccineID')
            ->join('hospitals','hospitals.id','=','hospital_vaccines.hospitalID')
            ->select('hospitals.hospital_name','hospitals.phone','hospitals.map_link as map','hospitals.address as hospitalAddress','hospitals.description as aboutHospital', 'vaccines.id as vacID', 'vaccines.vaccine_name')
            ->where('hospital_vaccines.hospitalID','=',$id)
            ->get();

        return view('pages.single_hospital', compact('page_name','data', 'hospital'));
    }
    public function consultant_profile($id){
        $profile = Consultant::find($id);
        return view('pages.consultant_profile', compact('profile'));
    }

    public function get_appoint_ment_page($id){
        $page_name = 'Consultant Appointment';
        $consultant = Consultant::find($id);
        return view('pages.appointment', compact('page_name','consultant'));
    }

    public function book_consultant(Request $request){
        $this->validate($request, [
            'fullname' => 'required'
        ]);

        $book = new Booking();
        $book->fullname = $request->fullname;
        $book->userID   = $request->userID;
        $book->doctorID = $request->doctorID;
        $book->status   = 0;
        $book->save();
        $id = $book->id;
        return redirect()->route('pages.bkas', compact('id'));
    }

    public function bkas($id){
        $payment = Booking::find($id);
        $doctor = DB::table('bookings')
            ->join('consultants', 'consultants.id','=','bookings.doctorID')
            ->select('consultants.id as doctorID','consultants.price as Payment', 'bookings.id as bookingID')
            ->limit('1')
            ->get();
//        dd($doctor);
        return view('pages.bkas', compact('payment','doctor'));
    }

    public function next_payment($id){
        $booking = Booking::find($id);
        return view('pages.next_payment', compact('booking'));
    }

    public function make_bakas_payment($id){
        $booking = Booking::find($id);
        $doctor = DB::table('bookings')
            ->join('consultants', 'consultants.id','=','bookings.doctorID')
            ->select('consultants.id as doctorID','consultants.price as Payment', 'bookings.id as bookingID')
            ->limit('1')
            ->get();
//        dd($doctor);
        return view('pages.next_payment', compact('booking', 'doctor'));
    }


    public function final_payment(Request $request, $id){
        $this->validate($request,[
            'account_number' => 'required',
            'amount'         => 'required'
        ],[
            'account_number.required' => 'Enter Phone Number',
        ]);

        $code = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0,6);
        $invoice = rand(10000,1000000);

        $make_payment = Booking::find($id);

        $make_payment->account_number     = $request->account_number;
        $make_payment->payment_by         = 'Bkash';
        $make_payment->transaction_number = $code;
        $make_payment->status             = '1';
        $make_payment->invoice_number     = $invoice;
        $make_payment->amount             = $request->amount;

        $make_payment->save();

        return redirect()->route('user.appointment.view_appointment')->with('success', 'Registration Successful');
    }

    public function corona_vaccine_page(){
        $page_name = 'Covid 19 Vaccine';
        $corona    = CoronaVaccine::all();
        return view('pages.corona_vaccine', compact('page_name','corona'));
    }
    public function corona_reg($id){
        $corona = CoronaVaccine::find($id);
        $hospital = Hospital::all();
        $page_name = 'Covid 19 Vaccine Registration';
        return view('pages.corona_reg', compact('page_name','corona','hospital'));
    }
    public function corona_vaccine_reg(Request $request){
        $this->validate($request,[
            'userID'    => 'required',
            'vacID'     => 'required',
            'fullName'  => 'required | max:50',
            'phone'     => 'required | max:11 | min: 11',
            'nid'       => 'required | max:16 | min:16',
            'bod'       => 'required',
            'hospital'  => 'required',
            'address'   => 'required'
        ],[
            'fullName.required' => 'Please Enter Name',
            'fullName.max'      => 'Name Less Then 50 Character',
            'phone.required'    => 'Please Enter Phone',
            'phone.max'         => 'Phone Number Must be 11 Digit',
            'phone.min'         => 'Phone Number Mist be 11 Digit',
            'nid.required'      => 'Please Enter NID Number',
            'bod.required'      => 'Please Enter Date Of Birth',
            'nid.max'           => 'NID Number Must be 16 Digit',
            'nid.min'           => 'NID Number Must be 16 Digit',
            'hospital.required' => 'Please Select Hospital Name',
            'address.requires'  => 'Please Enter Address'
        ]);

        $corona_reg = new CoronaReg();
        $corona_reg->userID        = $request->userID;
        $corona_reg->vacId         = $request->vacID;
        $corona_reg->fullName      = $request->fullName;
        $corona_reg->phone         = $request->phone;
        $corona_reg->nid           = $request->nid;
        $corona_reg->bod           = $request->bod;
        $corona_reg->hospital      = $request->hospital;
        $corona_reg->address       = $request->address;
        $corona_reg->status        = 0;

        $corona_reg->save();

        return back()->with('success','Registration Successful');
    }

    public function get_contact_form(){
        $page_name = "Contact With Us";
        return view('pages.contact', compact('page_name'));
    }

    public function sendMessage(Request $request){
        $this->validate($request,[
            'fullName' => 'required',
            'email'    => 'required',
            'phone'    => 'required | min:11 | max:11',
            'message'  => 'required'
        ],[
            'fullName.required' => 'Please Enter Name',
            'email.required'    => 'Please Enter Email',
            'phone.required'    => 'Please Enter Phone Number',
            'phone.min'         => 'Phone Number Must Be 11 Digit',
            'phone.max'         => 'Phone Number Must Be 11 Digit',
            'message.required'  => 'Please Write Your Message'
        ]);

        $message = new ContactUs();
        $message->fullName = $request->fullName;
        $message->phone    = $request->phone;
        $message->email    = $request->email;
        $message->message  = $request->message;

        $message->save();

        return back()->with('success','Message Send Successful');
    }
}
