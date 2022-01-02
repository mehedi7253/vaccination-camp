<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campgain;

class CampgainController extends Controller
{
    public function get_all_campaign(){
        $page_name = 'Manage Campaign';
        $campaign = Campgain::all();
        return view('admin.campgain.manage_campgain', compact('page_name','campaign'));
    }
    public function get_add_form(){
        $page_name = 'Add New Campaign';
        return view('admin.campgain.add_campgain', compact('page_name'));
    }
    public function add_campagin(Request $request){
        $this->validate($request,[
            'title'       => 'required',
            'start_date'  => 'required',
            'end_date'    => 'required',
            'description' => 'required',
            'location'    => 'required',
            'image'       => 'required | mimes:jpg,png,jpeg|max:7048'
        ],[
            'title.required'       => 'Please Enter Title',
            'start_date.required'  => 'Please Enter Start Date',
            'end_date.required'    => 'Please Enter End Date',
            'description.required' => 'Please Enter Description',
            'location.required'    => 'Please Enter Location  Name',
            'image.required'       => 'Please Select An Image',
            'image.mimes'          => 'Please Select Jpg,png,jpeg Type',
            'image.max'            => 'Please Select Image Less Then 8 Mb'
        ]);

        $campaign = new Campgain();

        $campaign->title = $request->title;
        $campaign->start_date = $request->start_date;
        $campaign->end_date = $request->end_date;
        $campaign->location = $request->location;
        $campaign->description = $request->description;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('campaign/images/', $fileName);
            $campaign->image = $fileName;
        } else {
            return $request;
            $campaign->image = '';
        }

        $campaign->save();
        return redirect()->route('admin.campgain.get_all_campaign')->with('success','New Campaign Added Successful');
    }

    public function get_edit_page($id){
        $page_name = 'Update Details';
        $edit_data = Campgain::find($id);

        return view('admin.campgain.edit_campagin',compact('page_name','edit_data'));
    }

    public function update_data(Request $request, $id){
        $this->validate($request,[
            'title'       => 'required',
            'start_date'  => 'required',
            'end_date'    => 'required',
            'location'    => 'required',
            'description' => 'required',
        ],[
            'title.required'       => 'Please Enter Title',
            'start_date.required'  => 'Please Enter Start Date',
            'end_date.required'    => 'Please Enter End Date',
            'location.required'    => 'Please Enter Location Name',
            'description.required' => 'Please Enter Description'
        ]);

        $update_data = Campgain::find($id);

        $update_data->title = $request->title;
        $update_data->start_date = $request->start_date;
        $update_data->end_date = $request->end_date;
        $update_data->location = $request->location;
        $update_data->description = $request->description;

        $update_data->save();
        return redirect()->route('admin.campgain.get_all_campaign')->with('success','Campaign Data Update Successful');
    }

    public function delete_campain($id){
        $delete = Campgain::find($id);
        $delete->delete();
        return redirect()->route('admin.campgain.get_all_campaign')->with('success','Campaign Delete Successful');
    }
}
