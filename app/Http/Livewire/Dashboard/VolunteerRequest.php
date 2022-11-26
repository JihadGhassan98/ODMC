<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Citie;
use App\Models\Volunteer;
use Illuminate\Support\Facades\Auth;
class VolunteerRequest extends Component
{
    public $hasApplied=0;
    public function render()
    {
        return view('livewire.dashboard.volunteer-request',[
            'districts'=>$this->getDistricts(),
            'applied'=>$this->checkApplications(),
        ]);
    }

public function getDistricts(){

return Citie::where('active',1)->get();

}

public function checkApplications(){

if(count(Volunteer::where('user_id',Auth::user()->id)->get()) < 1){

    $this->hasApplied = 0;


}
else {

    $this->hasApplied = 1;

}

}



}
