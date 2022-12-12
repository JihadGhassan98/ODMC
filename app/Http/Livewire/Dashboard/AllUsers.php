<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\User;
class AllUsers extends Component
{
    public function countUsers(){

 return User::count();

    }
    public function render()
    {
        return view('livewire.dashboard.all-users',[


            'userCount' =>$this->countUsers(),
        ]);
    }
}
