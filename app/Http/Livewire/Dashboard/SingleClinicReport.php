<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use App\Models\Appointment_statuse;
use App\Models\Clinic;
use Session;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Volunteer;
class SingleClinicReport extends Component
{
    public $sortID=3;
    public function render()
    {
        return view('livewire.dashboard.single-clinic-report',[
         'appointments'=>$this->getAppts(),
         'status'=>Appointment_statuse::all(),
         'currClinic'=>Clinic::find(Session::get('CID')),
         'pending'=>Appointment::where('status_id',3)->count(),
         'cancelled'=>Appointment::where('status_id',2)->count(),
         'finished'=>Appointment::where('status_id',1)->count(),
        ]);
    }

public function sort_apts($id){

$this->sortID = $id;

}
    public function getAppts(){

        return Appointment::join('cities', 'appointments.city_id', 'cities.id')
        ->join('clinics', 'appointments.clinic_id', 'clinics.id')
        ->join('services', 'appointments.service_id', 'services.id')
        ->join('users', 'appointments.user_id', 'users.id')
        ->join('appointment_statuses', 'appointments.status_id', 'appointment_statuses.id')
        ->where('appointments.clinic_id',Session::get('CID'))
        ->where('appointments.status_id',$this->sortID)
        ->select(
            'cities.name_ar as city_ar',
            'cities.name_en as city_en',
            'clinics.name_ar as clinic_ar',
            'clinics.name_en as clinic_en',
            'appointments.*',
            'users.name as username',
            'users.phone as userphone',
            'users.email as useremail',
            'services.id as service_ID',
            'services.name_ar as service_ar',
            'services.name_en as service_en',
            'appointment_statuses.name_ar as status_ar',
            'appointment_statuses.name_en as status_en',
            'appointment_statuses.id as status_id',
        )->orderBy('created_at','desc')->get();
        
        
        
        
        
            }



            
    public function getDoctorData($id){

        return Doctor::where('id',$id)->first();


    }

    public function getVolunteerData($id){

        return Volunteer::join('users','volunteers.user_id','users.id')->first();


    }
}
