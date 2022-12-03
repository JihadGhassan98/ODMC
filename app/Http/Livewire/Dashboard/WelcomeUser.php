<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Citie;
class WelcomeUser extends Component
{
    public function render()
    {
        return view('livewire.dashboard.welcome-user',[
            'cities'=>$this->getCities(),
        ]);
    }


    public function getCities(){

        return Citie::where('active',1)->get();
    }
}
