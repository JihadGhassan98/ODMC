<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Clinic;
use App\Models\Doctor;
class AllClinics extends Component
{
    public function render()
    {
        return view('livewire.dashboard.all-clinics',[
        'clinicCount'=>Clinic::count(),

        ]);
    }
}
