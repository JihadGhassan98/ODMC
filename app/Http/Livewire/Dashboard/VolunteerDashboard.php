<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Appointment;
use Livewire\Component;
use App\Models\Citie;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Volunteer;

class VolunteerDashboard extends Component
{
    public $currCity; 
    public $currVolID ;
    public function render()
    {
        return view('livewire.dashboard.volunteer-dashboard',[
          'cities'=>$this->getCities(),
          'currVolunteer'=>Volunteer::where('user_id',Auth::user()->id)->first(),
          'users'=>$this->getUsers(),
          

        ]);
    }

    public function getUsers(){

        
        return User::where('need_volunteer',1)->get();
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
    public function getAppts($id){
$this->getCurrVolunteer();

if($this->currCity){
        return Appointment::join('cities', 'appointments.city_id', 'cities.id')
        ->join('clinics', 'appointments.clinic_id', 'clinics.id')
        ->join('services', 'appointments.service_id', 'services.id')
        ->join('appointment_statuses', 'appointments.status_id', 'appointment_statuses.id')
        ->where('appointments.user_id',$id)
        ->where('appointments.status_id',3)
        ->where('appointments.city_id',$this->currCity)
        ->where(function ($q) {
            $q
            ->where('appointments.volunteer_id',null)
            ->orWhere('appointments.volunteer_id',$this->currVolID)  ;
        })
        ->select(
            'cities.name_ar as city_ar',
            'cities.name_en as city_en',
            'clinics.name_ar as clinic_ar',
            'clinics.name_en as clinic_en',
            'appointments.*',
            'services.id as service_ID',
            'services.name_ar as service_ar',
            'services.name_en as service_en',
            'appointment_statuses.name_ar as status_ar',
            'appointment_statuses.name_en as status_en',
            'appointment_statuses.id as status_id',
        
        )
        ->orderBy('created_at','desc')
        ->get();
        }
        else{


            return Appointment::join('cities', 'appointments.city_id', 'cities.id')
            ->join('clinics', 'appointments.clinic_id', 'clinics.id')
            ->join('services', 'appointments.service_id', 'services.id')
            ->join('appointment_statuses', 'appointments.status_id', 'appointment_statuses.id')
            ->where('appointments.user_id',$id)
            ->where('appointments.status_id',3)
            ->where(function ($q) {
                $q
                ->where('appointments.volunteer_id',null)
                ->orWhere('appointments.volunteer_id',$this->currVolID)  ;
            })
            ->select(
                'cities.name_ar as city_ar',
                'cities.name_en as city_en',
                'clinics.name_ar as clinic_ar',
                'clinics.name_en as clinic_en',
                'appointments.*',
                'services.id as service_ID',
                'services.name_ar as service_ar',
                'services.name_en as service_en',
                'appointment_statuses.name_ar as status_ar',
                'appointment_statuses.name_en as status_en',
                'appointment_statuses.id as status_id',
            
            )
            ->orderBy('created_at','desc')
            ->get();

        }
    }
    public function getCurrVolunteer(){

        $vol = Volunteer::where('user_id',Auth::user()->id)->first();
  $this->currVolID = $vol->id;

    }
    public function addToList($id){

     $appt = Appointment::where('id',$id)->first();

     $appt->update([


        'volunteer_id'=> $this->currVolID,
     ]);

     $appt->save();

    }
    public function removeFromList($id){

     $appt = Appointment::where('id',$id)->first();

     $appt->update([


        'volunteer_id'=>null,
     ]);

     $appt->save();
     $this->currVolID = null;

    }
}
