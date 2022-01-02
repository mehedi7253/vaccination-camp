<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MissingVaccine;
use App\Models\Booking;
use App\Models\Services;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function get_appointment_data(){
        $page_name = "Pending Consultant Appointment";
        $appointment = DB::table('bookings')
            ->join('users','users.id','=','bookings.userID')
            ->join('consultants','consultants.id','=','bookings.doctorID')
            ->select('users.name as userName','users.id as userID','users.phone as userPhone', 'consultants.name as consultantName','consultants.phone as consultantPhone','consultants.price as Amount','bookings.status as bookingStatus','bookings.created_at as bookDate', 'bookings.id as bookingID')
            ->get();
        return view('admin.application.appointment', compact('page_name','appointment'));
    }
    public function completeAppointment(){
        $page_name = "Complete Consultant Appointment";
        $appointment = DB::table('bookings')
            ->join('users','users.id','=','bookings.userID')
            ->join('consultants','consultants.id','=','bookings.doctorID')
            ->select('users.name as userName','users.id as userID','users.phone as userPhone', 'consultants.name as consultantName','consultants.phone as consultantPhone','consultants.price as Amount','bookings.status as bookingStatus','bookings.created_at as bookDate', 'bookings.id as bookingID')
            ->where('bookings.status', '=', '3')
            ->get();
        return view('admin.application.complete_appointment', compact('page_name','appointment'));
    }
    public function update_consultant_status(Request $request, $id){
        $this->validate($request, [
            'status' => 'Required'
        ]);

        $status = Booking::find($id);
        $status->status = $request->status;
        $status->save();

        return redirect()->route('admin.application.get_appointment_data')->with('success', 'Update Successful');
    }

    public function missingVaccine_data(){
        $page_name = 'Date Missing Application List';
        $application = DB::table('missing_vaccines')
            ->join('vaccines','vaccines.id', '=', 'missing_vaccines.vacID')
            ->join('child_registrations','child_registrations.id','=','missing_vaccines.childID')
            ->select('child_registrations.id as child_id','child_registrations.first_name as childFirstName', 'child_registrations.last_name as childLastName', 'vaccines.id as vaccineID', 'vaccines.vaccine_name', 'missing_vaccines.id as Invoice_id', 'missing_vaccines.hospital_name', 'missing_vaccines.takenDate', 'missing_vaccines.missing_dose')
            ->get();

        return view('admin.missing_vaccine.view', compact('page_name','application'));
    }
    public function complete_data(){
        $page_name = 'Updated Missing Application List';
        $application = DB::table('missing_vaccines')
            ->join('vaccines','vaccines.id', '=', 'missing_vaccines.vacID')
            ->join('child_registrations','child_registrations.id','=','missing_vaccines.childID')
            ->select('child_registrations.id as child_id','child_registrations.first_name as childFirstName', 'child_registrations.last_name as childLastName', 'vaccines.id as vaccineID', 'vaccines.vaccine_name', 'missing_vaccines.id as Invoice_id', 'missing_vaccines.hospital_name', 'missing_vaccines.takenDate', 'missing_vaccines.missing_dose')
            ->get();

        return view('admin.missing_vaccine.complete', compact('page_name','application'));
    }
    public function details($id){
        $page_name = 'Application Details';
        $application = DB::table('missing_vaccines')
            ->join('users','users.id', '=', 'missing_vaccines.userID')
            ->join('vaccines','vaccines.id', '=', 'missing_vaccines.vacID')
            ->join('child_registrations','child_registrations.id','=','missing_vaccines.childID')
            ->where('missing_vaccines.id','=', $id)
            ->get();

        return view('admin.missing_vaccine.full_details', compact('page_name','application'));
    }

    public function updateMissingDate(Request $request, $id){
        $this->validate($request, [
            'takenDate' => 'required'
        ]);

        $up_date = MissingVaccine::find($id);
        $up_date->takenDate = $request->takenDate;
        $up_date->save();

        return redirect()->route('admin.missing_vaccine.missingVaccine_data')->with('success', 'Date Update Successful');
    }

    public function view_service_list(){
        $page_name = 'Home service List';
        $service = DB::table('services')
            ->join('vaccines','vaccines.id', '=', 'services.vacID')
            ->join('child_registrations','child_registrations.id','=','services.childID')
            ->select('child_registrations.id as child_id','child_registrations.first_name as childFirstName', 'child_registrations.last_name as childLastName', 'vaccines.id as vaccineID', 'vaccines.vaccine_name', 'services.dose_number', 'services.id as Invoice_id', 'services.address', 'services.takenDate')
            ->get();

        return view('admin.service.view', compact('page_name','service'));
    }

    public function service_details($id){
        $page_name = ' Application Details';
        $application = DB::table('services')
            ->join('users','users.id', '=', 'services.userID')
            ->join('vaccines','vaccines.id', '=', 'services.vacID')
            ->join('child_registrations','child_registrations.id','=','services.childID')
            ->where('services.id','=', $id)
            ->get();

        return view('admin.service.full_details', compact('page_name','application'));
    }

}
