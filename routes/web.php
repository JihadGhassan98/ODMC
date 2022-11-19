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

    Route::get('/myAppointments',function(){
return view('myAppointments');
    })->name('appointments');

    Route::post('/uploadPhoto/{user_id}','App\Http\Controllers\ImageUploader@saveUserImage');
    Route::get('uploadPhoto',function (){
    return view('uploadImage');
    });

    Route::post('uploadMedicalFile/{user_id}','App\Http\Controllers\medicalRecordUpload@storeMedicalFile');
    Route::get('/myMedicalRecords',function (){

return view('medicalRecord');

    });
   
});
