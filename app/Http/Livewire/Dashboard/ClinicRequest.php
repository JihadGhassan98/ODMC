<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Citie;
use App\Models\Clinic;
use Illuminate\Support\Facades\Auth;
class ClinicRequest extends Component
{

    public function applied(){

    $clinics = Clinic::where('user_id',Auth::user()->id)->get();

    if(count($clinics)){

        return 1;
    }
    else{

        return 0;
    }
    }
    public function render()
    {
        return view('livewire.dashboard.clinic-request',[

            'cities'=>$this->getCities(),
        ]);
    }
public function getCities(){


    return Citie::all();
}



}
