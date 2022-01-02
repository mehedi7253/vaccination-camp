<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Child_registration;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChildRegController extends Controller
{
    public function get_reg_child_form(){
        $page_name = 'Registration New Children';

        return view('user.Reg_child.reg_new_child', compact('page_name'));

    }
    public function view_all_children(){
        $page_name = 'All Children Details';

        $get_dtls = DB::table('child_registrations')
            ->where('user_id','=', Auth::user()->id)
            ->get();

        return view('user.Reg_child.view_reg_child', compact('page_name', 'get_dtls'));
    }

    public function add_new_child(Request $request){

//        $user_id = Auth::user()->id;

        $this->validate($request, [
            'first_name' => 'required | min:3 |max: 30',
            'last_name' => 'required | min:3 |max: 30',
            'birth_date' => 'required',
        ],[
            'first_name.required' => 'Please Enter First Name',
            'first_name.min' => 'Please Enter Minimum 3 Character Value In First Name',
            'first_name.max' => 'Please Enter Maximum 30 Character Value In First Name',
            'last_name.required' => 'Please Enter Last Name',
            'last_name.min' => 'Please Enter Minimum 3 Character Value In Last Name',
            'last_name.max' => 'Please Enter Maximum 30 Character Value In Last Name',
            'birth_date.required' => 'Please Select Birth Date',
        ]);

        $reg_child = new Child_registration();

        $reg_child->user_id           = Auth::user()->id;
        $reg_child->first_name        = $request->first_name;
        $reg_child->last_name         = $request->last_name;
        $reg_child->birth_date        = $request->birth_date;
        $reg_child->birth_certificate = $request->birth_certificate;

        $reg_child->save();

        return redirect()->route('user.Reg_child.view_all_children')->with('success', 'New Children Data Added Successful');
    }

    public function deleteChildData($id){
        $delete_child_data = Child_registration::find($id);

        $delete_child_data->delete();
        return redirect()->route('user.Reg_child.view_all_children')->with('success', 'Children Data Delete Successful');
    }
}
