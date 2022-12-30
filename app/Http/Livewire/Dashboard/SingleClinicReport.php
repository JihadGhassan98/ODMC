<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use App\Models\Appointment_statuse;
use App\Models\Clinic;
use Session;
class SingleClinicReport extends Component
{
    public $sortID=3;
    public function render()
    {
        return view('livewire.dashboard.single-clinic-report',[
         'appointments'=>$this->getAppts(),
         'status'=>Appointment_statuse::all(),
         'currClinic'=>Clinic::find(Session::get('CID')),
        ]);
    }

public function sort_apts($id){

$this->sortID = $id;

}
    public function getAppts(){

        return Appointment::join('cities', 'appointments.city_id', 'cities.id')
        ->join('clinics', 'appointments.clinic_id', 'clinics.id')
        ->join('services', 'appointments.service_id', 'services.id')
        ->join('appointment_statuses', 'appointments.status_id', 'appointment_statuses.id')
        ->where('appointments.clinic_id',Session::get('CID'))
        ->where('appointments.status_id',$this->sortID)
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
        )->orderBy('created_at','desc')->get();
        
        
        
        
        
            }
}
