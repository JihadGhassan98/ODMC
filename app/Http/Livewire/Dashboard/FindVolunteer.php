<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class FindVolunteer extends Component
{
    public function render()
    {
        return view('livewire.dashboard.find-volunteer');
    }

public function switchVol(){

   $user=User::find(Auth::user()->id);
if($user->need_volunteer == 1){
   $user->update([

    'need_volunteer'=>0
   ]);
   $user->save();
}
else{
   $user->update([

    'need_volunteer'=>1
   ]);
   $user->save();

}
}


}
