<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vaccine;
use App\Models\Hospital;
use App\Models\HospitalVaccine;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function hospital_list(){
        $page_name = 'All Hospital List';
        $hospital = Hospital::all();
        return view('admin.hospital.view', compact('page_name','hospital'));
    }

    public function get_add_form(){
        $page_name = 'Add New Hospital';
        return view('admin.hospital.add', compact('page_name'));
    }

    public function add_hospital(Request $request){
        $this->validate($request,[
            'hospital_name' => 'required',
            'phone'         => 'required | max:11 | min:11',
            'address'       => 'required',
            'map_link'      => 'required',
            'description'   => 'required'
        ],[
            'hospital_name.required' => 'Please Enter Hospital Name',
            'phone.required'         => 'Please Enter Hospital Phone Number',
            'phone.mx'               => 'Hospital Phone Number Must be 11 Digit',
            'phone.min'              => 'Hospital Phone Number Must Be 11 Digit',
            'address.required'       => 'Please Enter Hospital Address',
            'map_link.required'      => 'Please Enter Map Link',
            'description.required'   => 'Please Enter About Hospital'
        ]);

        $hospital = new Hospital();
        $hospital->hospital_name = $request->hospital_name;
        $hospital->phone         = $request->phone;
        $hospital->address       = $request->address;
        $hospital->map_link      = $request->map_link;
        $hospital->description   = $request->description;

        $hospital->save();

        return redirect()->route('admin.hospital.hospital_list')->with('success','New Hospital Data Added Successful');
    }

    public function get_update_data($id){
        $page_name = 'Update Hospital Data';
        $data = Hospital::find($id);
        return view('admin.hospital.edit', compact('page_name','data'));
    }
    public function update_data(Request $request, $id){
        $this->validate($request,[
            'phone'         => 'required | max:11 | min:11',
            'address'       => 'required',
            'map_link'      => 'required',
            'description'   => 'required'
        ],[
            'phone.required'         => 'Please Enter Hospital Phone Number',
            'phone.mx'               => 'Hospital Phone Number Must be 11 Digit',
            'phone.min'              => 'Hospital Phone Number Must Be 11 Digit',
            'address.required'       => 'Please Enter Hospital Address',
            'map_link.required'      => 'Please Enter Map Link',
            'description.required'   => 'Please Enter About Hospital'
        ]);

        $hospital = Hospital::find($id);
        $hospital->phone         = $request->phone;
        $hospital->address       = $request->address;
        $hospital->map_link      = $request->map_link;
        $hospital->description   = $request->description;
        $hospital->save();
        return redirect()->route('admin.hospital.hospital_list')->with('success','Hospital Data Update Successful');

    }
    public function delete_data($id){
        $delete = Hospital::find($id);
        $delete->delete();
        return redirect()->route('admin.hospital.hospital_list')->with('success','Hospital Data Delete Successful');
    }

    public function get_vaccine_id($id){
        $page_name = 'Add Vaccine Dose In Hospital';
        $hospital_id = Hospital::find($id);
        $vaccine = Vaccine::all();
        return view('admin.hospital.assign_vaccine', compact('page_name','hospital_id', 'vaccine'));
    }

    public function add_vaccine(Request $request){
        $this->validate($request,[
           'hospitalID' => 'required',
            'vaccineID' => 'required',
        ]);

        foreach ($request->vaccineID as $id => $as)
        {
            $vaccine = new HospitalVaccine();
            $vaccine->hospitalID = $request->hospitalID;
            $vaccine->vaccineID  = $request->vaccineID [$id];
            $vaccine->save();
        }
        return back()->with('success', 'Added Success');
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

//        dd($data);
        return view('admin.hospital.single_hospital', compact('page_name','data', 'hospital'));
    }
}
