<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consultant;
class ConsultantController extends Controller
{
    public function get_all_consultant(){
        $page_name = 'All Consultant List';
        $consultant = Consultant::all();
        return view('admin.consultant.view_consultant', compact('page_name','consultant'));
    }

    public function get_add_form(){
        $page_name = 'Add New Consultant';
        return view('admin.consultant.add_consultant', compact('page_name'));
    }
    public function add_consultant(Request $request){
        $this->validate($request, [
            'name'        => 'required',
            'email'       => 'required  | unique:consultants',
            'phone'       => 'required',
            'designation' => 'required',
            'current_job' => 'required',
            'price'       => 'required',
            'image'       => 'required | mimes:jpg,png,jpeg | max: 7048'
        ],[
            'name.required'        => 'Please Enter Name',
            'email.required'       => 'Please Enter Email',
            'email.unique'         => 'This EMail Already Taken..Try Again..!',
            'phone.required'       => 'Please Enter Phone',
            'designation.required' => 'Please Enter Designation',
            'current_job.required' => 'Please Enter Current Job Institute Name',
            'price.required'       => 'Please Enter Booking Price',
            'image.required'       => 'Please Select An Image',
            'image.mimes'          => 'Please Select Jpg,png,jpeg Type',
            'image.max'            => 'Please Select Image Less Then 8 Mb'
        ]);

        $consultant_add = new Consultant();
        $consultant_add->name          = $request->name;
        $consultant_add->email         = $request->email;
        $consultant_add->phone         = $request->phone;
        $consultant_add->designation   = $request->designation;
        $consultant_add->current_job   = $request->current_job;
        $consultant_add->price         = $request->price;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('consultant/images/', $fileName);
            $consultant_add->image = $fileName;
        } else {
            return $request;
            $consultant_add->image = '';
        }

        $consultant_add->save();
        return redirect()->route('admin.consultant.get_all_consultant')->with('success', 'New Consultant Added Successful');
    }

    public function profile($id){
        $page_name = 'Consultant Profile';
        $profile   = Consultant::find($id);
        return view('admin.consultant.profile', compact('page_name','profile'));
    }
    public function delete($id){
        $delete = Consultant::find($id);
        $delete->delete();
        return redirect()->route('admin.consultant.get_all_consultant')->with('success', 'Consultant Remove Successful');

    }
}
