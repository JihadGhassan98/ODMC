<?php

namespace App\Http\Controllers;
use App\Models\Clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class clinicRequests extends Controller
{
  
public function createClinic(Request $request){


$validated = $request->validate([

    'name_en'=>'required|max:50|unique:clinics',
    'name_ar'=>'required|max:50|unique:clinics',
    'city'=>'required',
    'address'=>'required',
    'email'=>'required|unique:clinics',
    'phone'=>'required|max:10000000000|unique:clinics',
    'clinic_logo'=>'required|mimes:jpg,jpeg,png'
]);

$year = date('Y');
$day = date('d');
$month = date('m');
$registration = $year .'-'.$month.'-'.$day;
$date = date_create($registration);
date_format($date,"Y-m-d");
$expiration = date_add($date, date_interval_create_from_date_string("30 days"));

if($validated){
    $imageName= rand().time().'.' . $request->clinic_logo->getClientOriginalExtension();
$clinic = Clinic::create([
    'name_en'=>$request->name_en,
    'name_ar'=>$request->name_ar,
    'city_id'=>$request->city,
    'address'=>$request->address,
    'email'=>$request->email,
    'phone'=>$request->phone,
    'image'=>$imageName,
'registration_date'=>$registration,
'expiration_date'=>$expiration,
'user_id'=>Auth::user()->id,

]);
}
$clinic->save();
$file = $request->file('clinic_logo');
$file->move('userImages/',$imageName);
return back();
}

}
