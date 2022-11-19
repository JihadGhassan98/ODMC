<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\User;
use App\Models\Allergie;
use App\Models\Drug;
use Illuminate\Support\Facades\Auth;

class MedicalRecord extends Component
{

    public $medicineName;
    public $allergyName_ar;
    public $allergyName_en;
    public function render()
    {
        return view('livewire.dashboard.medical-record',[
            'allergies'=>$this->getAllergies(),
            'drugs'=>$this->getDrugs(),
        ]);
    }

    public function deleteMedicalFile($id)
    {

      
        $user = User::find($id);
        $user->update(['medical_record_path' => null]);
        $user->save();

    }

    public function AddAllergy(){


        Allergie::create([
        'user_id'=>Auth::user()->id,
        'name_ar'=>$this->allergyName_ar,
        'name_en'=>$this->allergyName_en,
        ]);

        $this->allergyName_ar=null;
        $this->allergyName_en=null;
     
        
    }


    public function getAllergies(){


        return Allergie::where('user_id',Auth::user()->id)->get();
    } 
    public function getDrugs(){


        return Drug::where('user_id',Auth::user()->id)->get();
    } 
    public function deleteAllergy($id){

        Allergie::find($id)->delete();
    }
    public function deleteDrug($id){

        Drug::find($id)->delete();
    }
  
    public function AddDrug(){

     Drug::create([
    'name'=>$this->medicineName,
    'user_id'=>Auth::user()->id,
     ]);
     $this->medicineName=null;

    }

    
}
