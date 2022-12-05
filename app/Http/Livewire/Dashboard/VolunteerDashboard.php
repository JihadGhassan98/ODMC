<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Citie;
use Illuminate\Support\Facades\Auth;
use App\Models\Volunteer;

class VolunteerDashboard extends Component
{
    public $currCity; 
    public function render()
    {
        return view('livewire.dashboard.volunteer-dashboard',[
          'cities'=>$this->getCities(),
          'currVolunteer'=>Volunteer::where('user_id',Auth::user()->id)->first(),
          

        ]);
    }

    public function getCities(){

        return Citie::where('active',1)->get();
    }
    public function changeCurrentCity(){

       $currentVolunteer =  Volunteer::where('user_id',Auth::user()->id)->first();
       $currentVolunteer->update([

          'current_city_id'=>$this->currCity,

       ]);
    }
}
