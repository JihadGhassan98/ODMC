<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ImageUploader extends Controller
{

public function saveUserImage( Request $request ){

$id=Auth::user()->id;
    $item=User::find($id);
    $imageName= $id.rand().time().'.' . $request->profile_pic->getClientOriginalExtension();
       $item->update(['profile_photo_path' => $imageName]);
       $item->save();
       $file = $request->file('profile_pic');
       $file->move('userImages/',$imageName);
      return redirect()->to('/dashboard');



}


public function saveClinicLogo(Request $request){

    return redirect()->to('/allClinics');


}
}
