<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
Use App\Models\Volunteer;
use App\Models\Citie;
use App\Models\Clinic;
use Illuminate\Http\Request;

class volunteerRequests extends Controller
{
    
    public function putVolunteerRequest(Request $request){
        $certificatePath=rand().substr(Auth::user()->name,0,4).time().'.' . $request->certificate->getClientOriginalExtension();
        Volunteer::create([
         'user_id'=>Auth::user()->id,
         'current_city_id'=>$request->city,
         'certificate_path'=>$certificatePath,


        ]);
        $file = $request->file('certificate');
        $file->move('medicalReports/',$certificatePath);
        return back();



    }
}
