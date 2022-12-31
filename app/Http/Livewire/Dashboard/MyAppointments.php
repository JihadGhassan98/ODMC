<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Appointment;
use Livewire\Component;
use App\Models\Clinic;
use App\Models\Appointment_statuse;
use App\Models\Doctor;
use App\Models\Volunteer;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class MyAppointments extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.dashboard.my-appointments',[

            'appointments'=>$this->getAppts(),
            'status'=>Appointment_statuse::all(),
        ]);
    }

    public function getAppts(){

return Appointment::join('cities', 'appointments.city_id', 'cities.id')
->join('clinics', 'appointments.clinic_id', 'clinics.id')
->join('services', 'appointments.service_id', 'services.id')
->join('appointment_statuses', 'appointments.status_id', 'appointment_statuses.id')
->where('appointments.user_id',Auth::user()->id)
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



    public function getDoctorData($id){

        return Doctor::where('id',$id)->first();


    }

    public function getVolunteerData($id){

        return Volunteer::find($id);


    }



}
