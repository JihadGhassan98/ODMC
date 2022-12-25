<?php

namespace App\Http\Controllers;

use App\Models\Allergie;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use App\Models\Categorie;
use App\Models\Citie;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Http\Request;
class medicalRecordUpload extends Controller
{
    public function storeMedicalFile(Request $request,$id){
        // $id=Auth::user()->id;
        $item=User::find($id);
        $imageName= $id.substr(Auth::user()->name,0,4).time().'.' . $request->medicalFile->getClientOriginalExtension();
           $item->update(['medical_record_path' => $imageName]);
           $item->save();
           $file = $request->file('medicalFile');
           $file->move('medicalReports/',$imageName);
            return back();
    }

    public function storeDoctor(Request $request,$id){
        //
    }

}
