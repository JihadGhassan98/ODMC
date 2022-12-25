<?php

use Illuminate\Support\Facades\Route;

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
/*Localization route*/

Route::get('lang/{locale}', 'App\Http\Controllers\LocalizationController@lang');
/*End Locaalization route */

Route::get('/', function () {
    return view('website.homePage');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/myAppointments', function () {
        return view('myAppointments');
    })->name('appointments');

    Route::post('/uploadPhoto/{user_id}', 'App\Http\Controllers\ImageUploader@saveUserImage');
    Route::get('uploadPhoto', function () {
        return view('uploadImage');
    });

    Route::post('uploadMedicalFile/{user_id}', 'App\Http\Controllers\medicalRecordUpload@storeMedicalFile');
    Route::get('/myMedicalRecords', function () {

        return view('medicalRecord');
    });
    Route::post('saveVolunteerRequest', 'App\Http\Controllers\volunteerRequests@putVolunteerRequest');
    Route::get('/volunteerWithUs', function () {


        return view('volunteerRequest');
    });

    Route::get('allVolunteers', function () {


        return view('allVolunteers');
    });
    Route::get('allUsers', function () {


        return view('allUsers');
    });
  
    Route::get('allClinics', function () {
        return view('allClinics');
    });
    Route::post('/createClinic','App\Http\Controllers\clinicRequests@createClinic');
Route::get('/clinicRequest',function (){
    return view('clinicRequest');
});
    Route::get('volunteer', function () {

        return view('volunteerDashboard');
    });
    Route::post('saveDoctorInfo/{clinic_id}', 'App\Http\Controllers\medicalRecordUpload@storeMedicalFile');
    Route::post('/uploadClinicLogo/{clinic_id}','App\Http\Controllers\ImageUploader@saveClinicLogo');
    Route::get('/myClinic',function(){
     return view('myClinic');
    });
});
