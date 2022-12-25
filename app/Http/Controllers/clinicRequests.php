<?php

namespace App\Http\Controllers;
use App\Models\Clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class clinicRequests extends Controller
{
  
public function createClinic(Request $request){
$validated=$request->validate([
    'name_en'=>'required|max:50|unique:clinics',
    'name_ar'=>'required|max:50|unique:clinics',
    'city'=>'required',
    'address'=>'required',
    'email'=>'required|unique:clinics',
    'phone'=>'required|max:10000000000|unique:clinics',
    'clinic_logo'=>'required|mimes:jpg,jpeg,png',
    'category'=>'required',
    'w_start'=>'required',
    'w_end'=>'required',
]);



if($validated){
if($request->w_start == $request->w_en ){
    $request->w_start +=1;
    $request->w_end-=1;
}


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
    'user_id'=>Auth::user()->id,
    'week_start'=>$request->w_start,
    'week_end'=>$request->w_end,
    'day_start'=>$request->d_start,
    'day_end'=>$request->d_end
]);
}
$clinic->save();
$file = $request->file('clinic_logo');
$file->move('userImages/',$imageName);
return back();
}

}
