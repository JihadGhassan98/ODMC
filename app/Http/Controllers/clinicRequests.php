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
    'clinic_logo'=>'required|mimes:jpg,jpeg,png',
    'category'=>'required',
]);



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
    'category_id'=>$request->category,
// 'registration_date'=>$registration,
// 'expiration_date'=>$expiration,
'user_id'=>Auth::user()->id,

]);
}
$clinic->save();
$file = $request->file('clinic_logo');
$file->move('userImages/',$imageName);
return back();
}

}
