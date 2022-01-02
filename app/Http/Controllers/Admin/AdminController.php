<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vaccine;
use App\Models\Hospital;
use App\Models\Consultant;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::where('role_id', '=', '2')->count();
        $consultant = Consultant::count();
        $hospital   = Hospital::count();
        $vaccine    = Vaccine::count();
        return view('admin.index', compact('user', 'consultant', 'hospital', 'vaccine'));
    }

    public function message(){
        $page_name = "Public Message";
        $message = ContactUs::all();
        return view('admin.contact.view', compact('page_name','message'));
    }

    public function deleteMessage($id)
    {
        $delete = ContactUs::find($id);
        $delete->delete();

        return back()->with('success','Delete Successful');
    }
}
