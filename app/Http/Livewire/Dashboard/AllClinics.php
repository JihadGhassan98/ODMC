<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Clinic;
use App\Models\Doctor;
use Livewire\WithPagination;

class AllClinics extends Component
{
    use WithPagination;
    public $searchKey;
    public function render()
    {
        return view('livewire.dashboard.all-clinics',[
          'pendingClinics'=>$this->getPendingClinics(),
          'expiredClinics'=>$this->getExpiredClinics(),

        ]);
    }

    public function getPendingClinics(){

       if($this->searchKey)
        {
            return Clinic::where(function ($q) {
                $q
                ->Where('name_ar','like','%'.$this->searchKey.'%')
                ->Where('name_en','like','%'.$this->searchKey.'%')
                ->orWhere('email','like','%'.$this->searchKey.'%')
                ->orWhere('phone','like','%'.$this->searchKey.'%');
            })
            ->where('registration_date',null)
            ->distinct()
            ->paginate(30);
           
        }
        else{

            return Clinic::where('registration_date',null)->paginate(30);

        }


    }


    public function getExpiredClinics(){

        if($this->searchKey)
        {
            return Clinic::where(function ($q) {
                $q
                ->Where('name_ar','like','%'.$this->searchKey.'%')
                ->Where('name_en','like','%'.$this->searchKey.'%')
                ->orWhere('email','like','%'.$this->searchKey.'%')
                ->orWhere('phone','like','%'.$this->searchKey.'%');
            })
            ->where('expired',1)
            ->distinct()
            ->paginate(30);
           
        }
        else{

            return Clinic::where('expired',1)->paginate(30);

        }

    }


}
