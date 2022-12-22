<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Citie;
class ClinicRequest extends Component
{
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
