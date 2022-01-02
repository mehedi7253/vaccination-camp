<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CoronaVaccine;
use App\Models\CoronaReg;
use Illuminate\Support\Facades\DB;

class CoronaController extends Controller
{
    public function get_all(){
        $page_name = 'Manage Covid19 Vaccine Details';
        $corona = CoronaVaccine::all();
        return view('admin.corona.manage', compact('page_name','corona'));
    }
    public function get_add_form(){
        $page_name = 'Add Covid19 Vaccine';
        return view('admin.corona.add', compact('page_name'));
    }

    public function add_vaccine(Request $request){
        $this->validate($request, [
            'vaccine_name'   => 'required',
            'number_of_dose' => 'required',
            'dises_name'        => 'required',
            'description'    => 'required',
            'break'          => 'required',
            'image'  => 'required | mimes:jpg,png,jpeg|max:7048'
        ],[
            'vaccine_name.required'   => 'Please Enter Vaccine Name',
            'number_of_dose.required' => 'Please Enter Number Dose',
            'dises_name.required'     => 'Please Enter Disease Name',
            'description.required'    =>  'Please Enter Description',
            'break.required'          => 'Please Enter Vaccine Taken Time',
            'image.required'          => 'Please Select An Image',
            'image.mimes'             => 'Please Select Jpg,png,jpeg Type',
            'image.max'               => 'Please Select Image Less Then 8 Mb'
        ]);


        $corona = new CoronaVaccine();
        $corona->vaccine_name = $request->vaccine_name;
        $corona->number_of_dose = $request->number_of_dose;
        $corona->dises_name     = $request->dises_name;
        $corona->description    = $request->description;
        $corona->break          = $request->break;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('corona/images/', $fileName);
            $corona->image = $fileName;
        } else {
            return $request;
            $corona->image = '';
        }

        $corona->save();

        return redirect()->route('admin.corona.get_all')->with('success','Vaccine Added Success');

    }
    public function delete_corona_vaccine($id){
        $delete = CoronaVaccine::find($id);
        $delete->delete();
        return redirect()->route('admin.corona.get_all')->with('success','Vaccine Delete Successful');

    }

    public function get_edit_page($id){
        $page_name = 'Update Vaccine Data';
        $edit_data = CoronaVaccine::find($id);
        return view('admin.corona.edit',compact('page_name','edit_data'));
    }

    public function update_data(Request $request, $id){
        $this->validate($request, [
            'vaccine_name'   => 'required',
            'number_of_dose' => 'required',
            'dises_name'     => 'required',
            'description'    => 'required',
            'break'          => 'required',

        ],[
            'vaccine_name.required'   => 'Please Enter Vaccine Name',
            'number_of_dose.required' => 'Please Enter Number Dose',
            'dises_name.required'     => 'Please Enter Disease Name',
            'description.required'    =>  'Please Enter Description',
            'break.required'          => 'Please Enter Vaccine Taken Time'
        ]);

        $corona_up_data = CoronaVaccine::find($id);

        $corona_up_data->vaccine_name   = $request->vaccine_name;
        $corona_up_data->number_of_dose = $request->number_of_dose;
        $corona_up_data->dises_name     = $request->dises_name;
        $corona_up_data->description    = $request->description;
        $corona_up_data->break          = $request->break;
        $corona_up_data->save();

        return redirect()->route('admin.corona.get_all')->with('success',' Data update Successful');
    }

    public function corona_reg_details(){
        $page_name = 'Covid19 Vaccine Registration Details';

        $corona = DB::table('corona_regs')
            ->join('users','users.id','=','corona_regs.userID')
            ->join('corona_vaccine','corona_vaccine.id', '=', 'corona_regs.vacID')
            ->select('corona_regs.id as serial', 'corona_regs.fullName as userName', 'corona_regs.phone as userPhone','corona_regs.bod as userDob', 'corona_regs.nid as userNID', 'corona_regs.hospital','corona_regs.address as userAddress','corona_regs.takenDate','corona_regs.dosetaken','users.id as userID','corona_vaccine.id as vacID', 'corona_vaccine.number_of_dose', 'corona_vaccine.break')
            ->get();
        return view('admin.corona_vaccine.manage', compact('page_name','corona'));
    }

    public function update_corona_vaccine(Request $request, $id){
        $this->validate($request,[
            'dosetaken' => 'required',
        ]);

        $update = CoronaReg::find($id);

        $date = date('Y-m-d');
        $update->dosetaken = $request->dosetaken;
        $update->takenDate = $date;
        $update->save();

        return back();
    }
    public function update_date(Request $request, $id){
        $this->validate($request,[
            'takenDate' => 'required',
        ]);

        $update_date = CoronaReg::find($id);
        $update_date->takenDate = $request->takenDate;
        $update_date->save();

        return back();
    }
}
