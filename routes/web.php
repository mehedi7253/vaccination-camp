<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ChildRegController;
use App\Http\Controllers\Admin\VaccineController;
use App\Http\Controllers\Admin\CampgainController;
use App\Http\Controllers\Admin\MeritDemeritController;
use App\Http\Controllers\Admin\ConsultantController;
use App\Http\Controllers\User\RegVaccineController;
use App\Http\Controllers\Admin\UpdateVaccineTakenController;
use App\Http\Controllers\Page\PageController;
use App\Http\Controllers\Admin\CoronaController;
use App\Http\Controllers\Admin\HospitalController;
use App\Http\Controllers\User\MissingvaccineController;
use App\Http\Controllers\user\ServiceController;
use App\Http\Controllers\Admin\ApplicationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $vaccine = DB::table('vaccines')->limit(6)->get();
    $campin  = DB::table('campgains')->limit(6)->get();
    $consultant = DB::table('consultants')->limit(6)->get();
    return view('welcome', compact('vaccine','campin', 'consultant'));
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin','middleware' => ['admin', 'auth'], 'namespace'=>'admin'], function (){
    Route::get('index', [AdminController::class, 'index'])->name('admin.index');

    //manage vaccine
    Route::get('/vaccine/get_all_vaccine', [VaccineController::class, 'get_all_vaccine'])->name('admin.vaccine.get_all_vaccine');
    Route::get('/vaccine/get_add_vaccine_page', [VaccineController::class, 'get_add_vaccine_page'])->name('admin.vaccine.get_add_vaccine_page');
    Route::post('/vaccine/add_vaccine', [VaccineController::class, 'add_vaccine'])->name('admin.vaccine.add_vaccine');
    Route::get('/vaccine/get_edit_page/{id}', [VaccineController::class, 'get_edit_page'])->name('admin.vaccine.get_edit_page');
    Route::put('/vaccine/update_data/{id}', [VaccineController::class, 'update_data'])->name('admin.vaccine.update_data');
    Route::delete('/vaccine/delete_vaccine/{id}', [VaccineController::class, 'delete_vaccine'])->name('admin.vaccine.delete_vaccine');
    Route::get('/Vaccine/show/{id}', [VaccineController::class, 'show'])->name('admin.vaccine.show');

    //Campaign
    Route::get('/campgain/get_all_campaign', [CampgainController::class, 'get_all_campaign'])->name('admin.campgain.get_all_campaign');
    Route::get('/campgain/get_add_form', [CampgainController::class, 'get_add_form'])->name('admin.campgain.get_add_form');
    Route::post('/campgain/add_campagin', [CampgainController::class, 'add_campagin'])->name('admin.campgain.add_campagin');
    Route::get('/campgain/edit_campagin/{id}', [CampgainController::class, 'get_edit_page'])->name('admin.campgain.get_edit_page');
    Route::put('/campgain/update_data/{id}', [CampgainController::class, 'update_data'])->name('admin.campgain.update_data');
    Route::delete('/campgain/delete_campain/{id}', [CampgainController::class, 'delete_campain'])->name('admin.campgain.delete_campain');

    //Merit Demerit
    Route::get('/merit_demerit/get_all_meritDemrit_data',[MeritDemeritController::class, 'get_all_meritDemrit_data'])->name('admin.merit_demerit.get_all_meritDemrit_data');
    Route::get('/merit_demerit/get_add_form',[MeritDemeritController::class, 'get_add_form'])->name('admin.merit_demerit.get_add_form');
    Route::post('/merit_demerit/add_merit_demerit', [MeritDemeritController::class, 'add_merit_demerit'])->name('admin.merit_demerit.add_merit_demerit');
    Route::get('/merit_demerit/show/{id}', [MeritDemeritController::class, 'show'])->name('admin.merit_demerit.show');
    Route::delete('/merit_demerit/delete_merit_demerit/{id}', [MeritDemeritController::class, 'delete_merit_demerit'])->name('admin.merit_demerit.delete_merit_demerit');

    //consultant
    Route::get('/consultant/get_all_consultant',[ConsultantController::class, 'get_all_consultant'])->name('admin.consultant.get_all_consultant');
    Route::get('/consultant/get_add_form',[ConsultantController::class, 'get_add_form'])->name('admin.consultant.get_add_form');
    Route::post('/consultant/add_consultant',[ConsultantController::class, 'add_consultant'])->name('admin.consultant.add_consultant');
    Route::get('/consultant/profile/{id}',[ConsultantController::class, 'profile'])->name('admin.consultant.profile');
    Route::delete('/consultant/delete/{id}',[ConsultantController::class, 'delete'])->name('admin.consultant.delete');

    //vaccine taken status
    Route::get('/vaccine_take/view', [UpdateVaccineTakenController::class, 'view'])->name('admin.vaccine_take.view');
    Route::get('/vaccine_take/view_vaccine_taken_details/{id}', [UpdateVaccineTakenController::class, 'view_vaccine_taken_details'])->name('admin.vaccine_take.view_vaccine_taken_details');
    Route::put('/vaccine_take/update/{id}', [UpdateVaccineTakenController::class, 'update'])->name('admin.vaccine_take.update');

    //Corona Vaccine
    Route::get('/corona/get_all', [CoronaController::class, 'get_all'])->name('admin.corona.get_all');
    Route::get('/corona/get_add_form', [CoronaController::class, 'get_add_form'])->name('admin.corona.get_add_form');
    Route::post('/corona/add_vaccine', [CoronaController::class, 'add_vaccine'])->name('admin.corona.add_vaccine');
    Route::get('/corona/get_edit_page/{id}', [CoronaController::class, 'get_edit_page'])->name('admin.corona.get_edit_page');
    Route::put('/corona/update_data/{id}', [CoronaController::class, 'update_data'])->name('admin.corona.update_data');
    Route::delete('/corona/delete_corona_vaccine/{id}', [CoronaController::class, 'delete_corona_vaccine'])->name('admin.corona.delete_corona_vaccine');

    //corona vaccine reg. details update
    Route::get('/corona_vaccine/corona_reg_details', [CoronaController::class, 'corona_reg_details'])->name('admin.corona_vaccine.corona_reg_details');
    Route::put('/corona_vaccine/update_corona_vaccine/{id}', [CoronaController::class, 'update_corona_vaccine'])->name('admin.corona_vaccine.update_corona_vaccine');
    Route::put('/corona_vaccine/update_date/{id}', [CoronaController::class, 'update_date'])->name('admin.corona_vaccine.update_date');

    //hospital
    Route::get('/hospital/hospital_list', [HospitalController::class, 'hospital_list'])->name('admin.hospital.hospital_list');
    Route::get('/hospital/get_add_form', [HospitalController::class, 'get_add_form'])->name('admin.hospital.get_add_form');
    Route::post('/hospital/add_hospital', [HospitalController::class, 'add_hospital'])->name('admin.hospital.add_hospital');
    Route::get('/hospital/get_update_data/{id}', [HospitalController::class, 'get_update_data'])->name('admin.hospital.get_update_data');
    Route::put('/hospital/update_data/{id}', [HospitalController::class, 'update_data'])->name('admin.hospital.update_data');
    Route::delete('/hospital/delete_data/{id}', [HospitalController::class, 'delete_data'])->name('admin.hospital.delete_data');

    //add vaccine on hospital
    Route::get('/hospital/get_vaccine_id/{id}', [HospitalController::class, 'get_vaccine_id'])->name('admin.hospital.get_vaccine_id');
    Route::post('/hospital/add_vaccine', [HospitalController::class, 'add_vaccine'])->name('admin.hospital.add_vaccine');
    Route::get('/hospital/get_hospital_data/{id}', [HospitalController::class, 'get_hospital_data'])->name('admin.hospital.get_hospital_data');

    //Application
    Route::get('/application/get_appointment_data', [ApplicationController::class, 'get_appointment_data'])->name('admin.application.get_appointment_data');
    Route::get('/application/completeAppointment', [ApplicationController::class, 'completeAppointment'])->name('admin.application.completeAppointment');
    Route::put('/application/update_consultant_status/{id}', [ApplicationController::class, 'update_consultant_status'])->name('admin.application.update_consultant_status');
    Route::get('/missing_vaccine/missingVaccine_data', [ApplicationController::class, 'missingVaccine_data'])->name('admin.missing_vaccine.missingVaccine_data');
    Route::get('/missing_vaccine/complete_data', [ApplicationController::class, 'complete_data'])->name('admin.missing_vaccine.complete_data');
    Route::get('/missing_vaccine/details/{id}', [ApplicationController::class, 'details'])->name('admin.missing_vaccine.details');
    Route::put('/missing_vaccine/updateMissingDate/{id}', [ApplicationController::class, 'updateMissingDate'])->name('admin.missing_vaccine.updateMissingDate');
    Route::get('/service/view_service_list', [ApplicationController::class, 'view_service_list'])->name('admin.service.view_service_list');
    Route::get('/service/service_details/{id}', [ApplicationController::class, 'service_details'])->name('admin.service.service_details');

    //contact page
    Route::get('/contact/message', [AdminController::class, 'message'])->name('admin.contact.message');
    Route::delete('/contact/deleteMessage/{id}', [AdminController::class, 'deleteMessage'])->name('admin.contact.deleteMessage');

});



//user
Route::group(['prefix' => 'user','middleware' => ['user', 'auth'], 'namespace'=>'user'], function (){
    Route::get('index', [UserController::class, 'index'])->name('user.index');
    Route::get('/appointment/view_appointment', [UserController::class, 'view_appointment'])->name('user.appointment.view_appointment');

    //registraion new children and manage them
    Route::get('/Reg_child/get_child_reg_form', [ChildRegController::class, 'get_reg_child_form'])->name('user.Reg_child.get_reg_child_form');
    Route::get('/Reg_child/view_all_children', [ChildRegController::class, 'view_all_children'])->name('user.Reg_child.view_all_children');
    Route::post('/Reg_child/add_new_child', [ChildRegController::class, 'add_new_child'])->name('user.Reg_child.add_new_child');
    Route::delete('/Reg_child/deleteChildData/{id}', [ChildRegController::class, 'deleteChildData'])->name('user.Reg_child.deleteChildData');

    //vaccine registration
    Route::get('/vaccine_details/get_reg_form', [RegVaccineController::class,'get_reg_form'])->name('user.vaccine_details.get_reg_form');
    Route::get('/vaccine_details/search', [RegVaccineController::class, 'search'])->name('user.vaccine_details.search');
    Route::get('/vaccine_details/get_child_dtls/{id}', [RegVaccineController::class, 'get_child_dtls'])->name('user.vaccine_details.get_child_dtls');
    Route::post('/vaccine_details/reg_vaccine', [RegVaccineController::class, 'reg_vaccine'])->name('user.vaccine_details.reg_vaccine');
    Route::get('/vaccine_details/view_vaccine_reg', [RegVaccineController::class, 'view_vaccine_reg'])->name('user.vaccine_details.view_vaccine_reg');
    Route::get('/vaccine_details/view_vaccine_taken_details/{id}', [RegVaccineController::class, 'view_vaccine_taken_details'])->name('user.vaccine_details.view_vaccine_taken_details');
    Route::get('/vaccine_details/get_certificate/{id}', [RegVaccineController::class, 'get_certificate'])->name('user.vaccine_details.get_certificate');

    //corona vaccine
    Route::get('/corona/view_corona_reg', [UserController::class, 'view_corona_reg'])->name('user.corona.view_corona_reg');
    Route::get('/corona/get_more_dtls/{id}', [UserController::class, 'get_more_dtls'])->name('user.corona.get_more_dtls');

    //update Profile
    Route::get('/update_profile/get_edit_page', [UserController::class, 'get_edit_page'])->name('user.update_profile.get_edit_page');
    Route::put('/update_profile/update_data', [UserController::class, 'update_data'])->name('user.update_profile.update_data');
    Route::get('/update_profile/get_updateProfilePic_from', [UserController::class, 'get_updateProfilePic_from'])->name('user.update_profile.get_updateProfilePic_from');
    Route::put('/update_profile/updateProfilePic', [UserController::class, 'updateProfilePic'])->name('user.update_profile.updateProfilePic');
    Route::get('/update_profile/get_change_pass_form', [UserController::class, 'get_change_pass_form'])->name('user.update_profile.get_change_pass_form');
//    Route::put('/update_profile/store_pass', [UserController::class, 'store_pass'])->name('user.update_profile.store_pass');

    //missing vaccine reg
    Route::get('/missing_vaccine/get_reg_form/{id}', [MissingvaccineController::class, 'get_reg_form'])->name('user.missing_vaccine.get_reg_form');
    Route::post('/missing_vaccine/reg_missingVaccine', [MissingvaccineController::class, 'reg_missingVaccine'])->name('user.missing_vaccine.reg_missingVaccine');
    Route::get('/missing_vaccine/pay_now/{id}', [MissingvaccineController::class, 'pay_now'])->name('user.missing_vaccine.pay_now');
    Route::get('/missing_vaccine/next_pay/{id}', [MissingvaccineController::class, 'next_pay'])->name('user.missing_vaccine.next_pay');
    Route::put('/missing_vaccine/make_payment/{id}', [MissingvaccineController::class, 'make_payment'])->name('user.missing_vaccine.make_payment');
    Route::delete('/missing_vaccine/cancel_payment/{id}', [MissingvaccineController::class, 'cancel_payment'])->name('user.missing_vaccine.cancel_payment');
    Route::get('/missing_vaccine/my_application', [MissingvaccineController::class, 'my_application'])->name('user.missing_vaccine.my_application');
    Route::get('/missing_vaccine/details/{id}', [MissingvaccineController::class, 'details'])->name('user.missing_vaccine.details');

    //take service
    Route::get('/services/view_my_service', [ServiceController::class, 'view_my_service'])->name('user.services.view_my_service');
    Route::get('/services/get_request_form', [ServiceController::class, 'get_request_form'])->name('user.services.get_request_form');
    Route::post('/services/RequestService', [ServiceController::class, 'RequestService'])->name('user.services.RequestService');
    Route::get('/services/pay_now/{id}', [ServiceController::class, 'pay_now'])->name('user.services.pay_now');
    Route::get('/services/next_pay/{id}', [ServiceController::class, 'next_pay'])->name('user.services.next_pay');
    Route::put('/services/make_payment/{id}', [ServiceController::class, 'make_payment'])->name('user.services.make_payment');
    Route::get('/services/details/{id}', [ServiceController::class, 'details'])->name('user.services.details');

});

//pages
Route::prefix('pages')->group(function (){
    Route::get('/vaccine', [PageController::class,'vaccine'])->name('pages.vaccine');
    Route::get('/vaccine_dtls/{id}', [PageController::class,'vaccine_dtls'])->name('pages.vaccine_dtls');
    Route::get('/campaign', [PageController::class,'campaign'])->name('pages.campaign');
    Route::get('/campgain_details/{id}', [PageController::class,'campgain_details'])->name('pages.campgain_details');
    Route::get('/consultant', [PageController::class,'consultant'])->name('pages.consultant');
    Route::get('/consultant_profile/{id}', [PageController::class,'consultant_profile'])->name('pages.consultant_profile');
    Route::get('/corona_vaccine_page', [PageController::class,'corona_vaccine_page'])->name('pages.corona_vaccine_page');
    Route::get('/corona_vaccine/{id}', [PageController::class,'corona_reg'])->name('pages.corona_reg');
    Route::post('/corona_vaccine_reg', [PageController::class,'corona_vaccine_reg'])->name('pages.corona_vaccine_reg');
    Route::get('/hospital', [PageController::class,'hospital'])->name('pages.hospital');
    Route::get('/get_hospital_data/{id}', [PageController::class,'get_hospital_data'])->name('pages.get_hospital_data');
    Route::get('/get_contact_form', [PageController::class,'get_contact_form'])->name('pages.get_contact_form');
    Route::post('/sendMessage', [PageController::class,'sendMessage'])->name('pages.sendMessage');

    //apppointment
    Route::get('/appointment/{id}', [PageController::class,'get_appoint_ment_page'])->name('pages.get_appoint_ment_page');
    Route::post('/appointment', [PageController::class,'book_consultant'])->name('pages.book_consultant');
    Route::get('/bkas/{id}', [PageController::class,'bkas'])->name('pages.bkas');
    Route::get('/make_bakas_payment/{id}', [PageController::class,'make_bakas_payment'])->name('pages.make_bakas_payment');
    Route::get('/next_payment/{id}', [PageController::class,'next_payment'])->name('pages.next_payment');
    Route::put('/final_payment/{id}', [PageController::class,'final_payment'])->name('pages.final_payment');

});