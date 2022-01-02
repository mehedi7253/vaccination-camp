<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vaccine;
use App\Models\MeritDemerit;
use Illuminate\Support\Facades\DB;

class MeritDemeritController extends Controller
{
    public function get_all_meritDemrit_data(){
        $page_name = 'Merit Demerit List';
        $get_data  = DB::select(DB::raw("SELECT * FROM vaccines, merit_demerits WHERE merit_demerits.vaccine_id = vaccines.id GROUP BY merit_demerits.vaccine_id"));

        return view('admin.merit_demerit.view', compact('page_name','get_data'));
    }

    public function get_add_form(){
        $page_name = 'Add New Merit And Demerit';
        $vaccin = Vaccine::all();
        return view('admin.merit_demerit.add_meritdemerit', compact('page_name', 'vaccin'));
    }

    public function add_merit_demerit(Request $request){
        $this->validate($request, [
            'vaccine_id'    => 'required',
            'merit_demerit' => 'required',
            'description'   =>'required'
        ],[
            'vaccine_id.required'    => 'Please Select One Vaccine Name',
            'merit_demerit.required' => 'Please Select Merit or Demerit',
            'description.required'   => 'Please Write Description'
        ]);

        $meritDemerit = new MeritDemerit();
        $meritDemerit->vaccine_id    = $request->vaccine_id;
        $meritDemerit->merit_demerit = $request->merit_demerit;
        $meritDemerit->description   = $request->description;

        $meritDemerit->save();
        return redirect()->route('admin.merit_demerit.get_all_meritDemrit_data')->with('success','New Merit Demerit List added Successful');
    }

    public function show($id){
        $page_name = "View Merit Demerit Details";
        $vaccine = Vaccine::find($id);
        $get_all = DB::table('merit_demerits')
            ->join('vaccines', 'vaccines.id', '=', 'merit_demerits.vaccine_id')
            ->select('merit_demerits.id as meritID','vaccines.id as vaccineID', 'vaccines.vaccine_name', 'merit_demerits.merit_demerit', 'merit_demerits.description')
            ->where('vaccines.id', '=', $id)
            ->get();
        return view('admin.merit_demerit.show', compact('page_name', 'vaccine', 'get_all'));
    }

    public function delete_merit_demerit($id){
        $delete = MeritDemerit::find($id);
        $delete->delete();
        return back()->with('success','Data Delete Successful');
//        return redirect()->route('admin.merit_demerit.get_all_meritDemrit_data')->with('success','Data Delete Successful');

    }
}
