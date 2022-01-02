<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        return view('user.index');
    }

    public function get_edit_page(){
        $page_name = "Update Profile";
        $get_edit_data = Auth::user();
        return view('user.update_profile.update', compact('get_edit_data', 'page_name'));
    }
    public function update_data(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'address' => 'required'
        ]);

        $profile = Auth::user();
        $profile->name = $request->name;
        $profile->phone = $request->phone;
        $profile->gender = $request->gender;
        $profile->address = $request->address;

        $profile->save();

        return redirect()->route('user.index');
    }

    public function get_updateProfilePic_from()
    {
        $page_name = "Update Profile Picture";
        $get_edit_pic_data = Auth::user();
        return view('user.update_profile.update_profile_pic', compact('get_edit_pic_data', 'page_name'));
    }
    public function updateProfilePic(Request $request)
    {
        $this->validate($request, [
            'user_image' => 'required | mimes:jpg,png,jpeg,gif,svg|max:7048'
        ]);

        $user_image = Auth::user();
        if ($request->hasFile('user_image')) {
            $file = $request->file('user_image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('user/images/', $fileName);
            $user_image->user_image = $fileName;
        } else {
            return $request;
            $user_image->user_image = '';
        }

        $user_image->save();

        return back()->with('success', 'profile Picture Update Successful');
    }

    public function get_change_pass_form()
    {
        $page_name = "Change Password";
        $get_pass = Auth::user();
        return view('user.update_profile.change_password', compact('get_pass','page_name'));
    }

    public function store_pass(Request $request)
    {
//        $this->validate($request,[
//            'current-password' => 'required | min:4',
//            'new-password' => 'required',
//            'new-password-confirm' => 'required'
//        ]);
//        $data = $request->all();
//        if (Hash::check($data['current-password'], Auth::guard('user')->user()->password))
//        {
//            if ($request->isMethod('post'))
//            {
//                if ($data['new-password'] == $data['new-password-confirm'])
//                {
//                    User::where('id', Auth::guard('user')->user()->id)->update(['password'=> Hash::make($data['new-password'])]);
//                    session()->flash('success', 'Your  Password Change Successful');
//                }else{
//                    session()->flash('new_confirm_not_match', 'Your New Password And Confirm Password Not Match');
//                }
//                $data =$request->all();
////               echo "pre"; print_r($data); die();
//            }
//        }else{
//            session()->flash('old_pass_not_match', 'Your old Password Not Match');
//        }
//        return back();
    }

    public function view_appointment(){
        $page_name = 'Appointment List';
        $appointment = DB::table('bookings')
            ->join('users','users.id','=','bookings.userID')
            ->join('consultants','consultants.id','=','bookings.doctorID')
            ->select('users.name as userName','users.id as userID','consultants.name as consultantName','consultants.phone as consultantPhone','consultants.price as Amount','bookings.status as bookingStatus','bookings.created_at as bookDate')
//            ->where('bookings.status', '=','1')
            ->where('bookings.userID','=', Auth::user()->id)
            ->get();
        return view('user.appointment.appointment',compact('page_name','appointment'));
    }

    public function view_corona_reg(){
        $page_name = 'Corona Vaccine';
        $corona = DB::table('corona_regs')
            ->join('users','users.id','=','corona_regs.userID')
            ->join('corona_vaccine','corona_vaccine.id', '=', 'corona_regs.vacID')
            ->select('corona_regs.id as serial', 'corona_regs.fullName as userName', 'corona_regs.phone as userPhone','corona_regs.bod as userDob', 'corona_regs.nid as userNID', 'corona_regs.hospital','corona_regs.address as userAddress','corona_regs.takenDate','corona_regs.dosetaken','users.id as userID','corona_vaccine.id as vacID', 'corona_vaccine.number_of_dose', 'corona_vaccine.break')
            ->where('corona_regs.userID', '=', Auth::user()->id)
            ->get();
        return view('user.corona.view', compact('page_name', 'corona'));
    }

    public function get_more_dtls($id){
        $page_name = 'Covid 19 Vaccination Card';
        $dtls = DB::table('corona_regs')
            ->join('users','users.id','=','corona_regs.userID')
            ->join('corona_vaccine','corona_vaccine.id', '=', 'corona_regs.vacID')
            ->where('corona_regs.id', '=', $id)
            ->get();
        return view('user.corona.details', compact('page_name','dtls'));
    }

}
