<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Volunteer;
use App\Models\Citie;
use App\Models\User;

class AllVolunteers extends Component
{
    public function render()
    {
        return view('livewire.dashboard.all-volunteers',[
            'volunteers'=>$this->getVolunteers(),
             'volunteerRequests'=>$this->getVolunteerRequests(),
            'cities'=>$this->getCities(),
            
        ]);


    }

public function getCities(){


    return Citie::where('active',1)->get();
}


public function getVolunteers(){

return Volunteer::join('users','volunteers.user_id','users.id')->where('users.type',2)
->join('cities','volunteers.current_city_id','cities.id')
->where('cities.active',1)->get([
    'users.*',
    'users.id as userID',
    'volunteers.*',
    'volunteers.id as volID',
    'cities.*',
    'cities.name_ar as city_ar',
    'cities.name_en as city_en',
]);

}
public function getVolunteerRequests(){

return Volunteer::join('users','volunteers.user_id','users.id')->where('users.type','!=',2)
->join('cities','volunteers.current_city_id','cities.id')
->where('cities.active',1)
->get([
    'users.*',
    'users.id as userID',
    'volunteers.*',
    'volunteers.id as volID',
    'cities.*',
    'cities.name_ar as city_ar',
    'cities.name_en as city_en',
    ]);

}

public function acceptVolunteer($id){

    $user = User::find($id);

    $user->update([
        'type'=>2,
    ]);
    $user->save();

    
}
public function rejectVolunteer($id){

 Volunteer::find($id)->delete();
 

}
public function deleteVolunteer($UID,$VID){

    Volunteer::find($VID)->delete();

    $user = User::find($UID);

    $user->update([
        'type'=>1,
    ]);
    $user->save();
}

}
