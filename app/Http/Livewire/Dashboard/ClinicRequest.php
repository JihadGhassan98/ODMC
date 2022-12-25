<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Citie;
use App\Models\Clinic;
use App\Models\Categorie;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
class ClinicRequest extends Component
{
    public $daysOfTheWeek =['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
    public $daysOfTheWeek_ar =['الأحد','الإثنين','الثلاثاء','الأربعاء','الخميس','الجمعة','السبت','الأحد','الإثنين','الثلاثاء','الأربعاء','الخميس','الجمعة','السبت'];
    public function applied(){

    $clinics = Clinic::where('user_id',Auth::user()->id)->get();

    if(count($clinics)){

        return 1;
    }
    else{

        return 0;
    }
    }
    public function render()
    {
        return view('livewire.dashboard.clinic-request',[

            'cities'=>$this->getCities(),
            'categories'=>$this->getCategories(),
        ]);
    }
public function getCities(){


    return Citie::all();
}
public function getCategories(){


    return Categorie::all();
}



}
