<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Appointment;
use App\Models\Clinic;
use App\Models\Doctor;
use Livewire\Component;
use App\Models\User;
use App\Models\Volunteer;
use Livewire\WithPagination;
use Session;
class AllUsers extends Component
{
    use WithPagination;
    public $searchKey;
    public $deletePrompt = 0;
    public function countUsers(){

 return User::count();

    }
    public function render()
    {
        return view('livewire.dashboard.all-users',[


            'userCount' =>$this->countUsers(),
            'users'=>$this->getUsers(),
        ]);
    }

public function getUsers(){

    if($this->searchKey)
{
    return User::where(function ($q) {
        $q
        ->Where('users.name','like','%'.$this->searchKey.'%')
        ->orWhere('users.email','like','%'.$this->searchKey.'%')
        ->orWhere('users.phone','like','%'.$this->searchKey.'%');
        ;
    })
    ->distinct()
    ->paginate(30);
   
}
else{

return User::paginate(30);

}
}


public function userType($id){


    $user = User::find($id);
        if($user->type == 4){

            $vol = Volunteer::where('user_id',$id)->count();
            $clins = Clinic::where('user_id',$id)->count();
            if($clins != 0){

                $user->update([

                    'type'=>3
                ]);
                $user->save();

            }
            else if($vol != 0 ){

                $user->update([

                    'type'=>2
                ]);
                $user->save();

            }
            else{

                $user->update([

                    'type'=>1
                ]);
                $user->save();

            }

        }
        else if($user->type != 4) {

            $user->update([

                'type'=>4
            ]);
            $user->save();

        }
    }

    public function activateUser($id){
        $user = User::find($id);
        $user->update([


                    'active'=>1
                ]);

    }
    public function deactivateUser($id){
        $user = User::find($id);
        $user->update([


                    'active'=>0
                ]);

    }

public function requestAction($id)
{


    Session::put('userID',$id);


        $this->deletePrompt =1;
    
}
public function closeAction()
{
        $this->deletePrompt =0;
}


public function deleteUser(){

$user= User::find(Session::get('userID'));

$appointments = Appointment::where('user_id',$user->id)->get();
$clinics = Clinic::where('user_id',$user->id)->get();
foreach($appointments as $appointment){
    $appointment->delete();
}
foreach($clinics as $clinic){

    $clinic->delete();
    $doctors = Doctor::where('clinic_id',$clinic->id)->get();
    
    foreach($doctors as $doctor){

        $doctor->delete();



    }
}

$volunteer = Volunteer::where('user_id',Session::get('userID'))->first();

$volunteer->delete();

}

}

