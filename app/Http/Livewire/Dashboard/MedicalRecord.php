<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\User;
use App\Models\Allergie;
use App\Models\Drug;
use App\Models\Choronic_disease;
use App\Models\Disabilitie;
use Illuminate\Support\Facades\Auth;

class MedicalRecord extends Component
{

    public $medicineName;
    public $allergyName_ar;
    public $allergyName_en;
    public $disability;
    public $disease;
    public function render()
    {
        return view('livewire.dashboard.medical-record',[
            'allergies'=>$this->getAllergies(),
            'drugs'=>$this->getDrugs(),
            'diseases'=>$this->getDiseases(),
            'disabilities'=>$this->getDisabilities(),
        ]);
    }

    public function deleteMedicalFile($id)
    {

      
        $user = User::find($id);
        $user->update(['medical_record_path' => null]);
        $user->save();

    }

    public function AddAllergy(){

        if($this->allergyName_en == null && $this->allergyName_en == null){

return ;
        };
        

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
if($this->medicineName == null){return;}
     Drug::create([
    'name'=>$this->medicineName,
    'user_id'=>Auth::user()->id,
     ]);
     $this->medicineName=null;

    }

    public function AddDisease(){
        if($this->disease == null){return;}
        Choronic_disease::create([
            'name'=>$this->disease,
            'user_id'=>Auth::user()->id,
             ]);
             $this->disease=null;

    }
    public function deleteDisease($id){

        Choronic_disease::find($id)->delete();
    }
    public function getDiseases(){

 return  Choronic_disease::where('user_id',Auth::user()->id)->get();
    }

    public function AddDisability(){
        if($this->disability == null){return;}
        Disabilitie::create([
            'name'=>$this->disability,
            'user_id'=>Auth::user()->id,
             ]);
             $this->disability=null;

    }
    public function deleteDisability($id){

        Disabilitie::find($id)->delete();
    }
    public function getDisabilities(){

 return  Disabilitie::where('user_id',Auth::user()->id)->get();
    }


    
}
