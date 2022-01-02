<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vaccine;
use App\Models\MeritDemerit;

class VaccineController extends Controller
{
   public function get_all_vaccine(){
       $page_name = "All Vaccine Details";

       $vaccine = Vaccine::all();

       return view('admin.vaccine.manage_vaccine', compact('page_name','vaccine'));
   }

   public function show($id){
       $page_name = 'Full Details';

       $vaccine_details = Vaccine::find($id);

       return view('admin.vaccine.show', compact('page_name','vaccine_details'));
   }

   public function get_add_vaccine_page(){
       $page_name = 'Add New vaccine';

       return view('admin.vaccine.add_vaccine', compact('page_name'));
   }
   public function add_vaccine(Request $request){
       $this->validate($request, [
           'vaccine_name'   => 'required | unique:vaccines',
           'number_of_dose' => 'required',
           'disease'        => 'required',
           'age_limit'      => 'required',
           'description'    => 'required',
           'break'          => 'required',
           'vaccine_image'  => 'required | mimes:jpg,png,jpeg|max:7048'
       ],[
           'vaccine_name.required'   => 'Please Enter Vaccine Name',
           'category_name.unique'    => 'This Name Is All Ready Added',
           'number_of_dose.required' => 'Please Enter Number Dose',
           'disease.required'        => 'Please Enter Disease Name',
           'age_limit.required'      => 'Please Enter Age Limit',
           'description.required'    =>  'Please Enter Description',
           'break.required'          => 'Please Enter Vaccine Taken Time',
           'vaccine_image.required'  => 'Please Select An Image',
           'vaccine_image.mimes'     => 'Please Select Jpg,png,jpeg Type',
           'vaccine_image.max'       => 'Please Select Image Less Then 8 Mb'
       ]);

       $vaccine = new Vaccine();
       $vaccine->vaccine_name   = $request->vaccine_name;
       $vaccine->number_of_dose = $request->number_of_dose;
       $vaccine->disease        = $request->disease;
       $vaccine->age_limit      = $request->age_limit;
       $vaccine->break          = $request->break;
       $vaccine->description    = $request->description;

       if ($request->hasFile('vaccine_image')) {
           $file = $request->file('vaccine_image');
           $extension = $file->getClientOriginalExtension();
           $fileName = time() . '.' . $extension;
           $file->move('Vaccine/images/', $fileName);
           $vaccine->vaccine_image = $fileName;
       } else {
           return $request;
           $vaccine->vaccine_image = '';
       }

       $vaccine->save();

       return redirect()->route('admin.vaccine.get_all_vaccine')->with('success','New Vaccine Added Successful');
   }

   public function get_edit_page($id){
       $page_name = 'Update Vaccine Data';

       $edit_data = Vaccine::find($id);
       return view('admin.vaccine.edit_vaccine',compact('page_name','edit_data'));
   }
   public function update_data(Request $request, $id){
       $this->validate($request, [
           'number_of_dose' => 'required',
           'disease'        => 'required',
           'age_limit'      => 'required',
           'description'    => 'required',
           'break'          => 'required',

       ],[
           'number_of_dose.required' => 'Please Enter Number Dose',
           'disease.required'        => 'Please Enter Disease Name',
           'age_limit.required'      => 'Please Enter Age Limit',
           'description.required'    =>  'Please Enter Description',
           'break.required'          => 'Please Enter Vaccine Taken Time',
       ]);

       $up_vaccine_data  = Vaccine::find($id);

       $up_vaccine_data->number_of_dose = $request->number_of_dose;
       $up_vaccine_data->disease        = $request->disease;
       $up_vaccine_data->age_limit      = $request->age_limit;
       $up_vaccine_data->description    = $request->description;
       $up_vaccine_data->break          = $request->break;

       $up_vaccine_data->save();

       return redirect()->route('admin.vaccine.get_all_vaccine')->with('success','Vaccine Data update Successful');
   }

   public function delete_vaccine($id){
       $delete = Vaccine::find($id);
       $delete->delete();
       return redirect()->route('admin.vaccine.get_all_vaccine')->with('success','Vaccine Data Delete Successful');

   }
}
