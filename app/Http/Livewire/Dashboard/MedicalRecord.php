<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\User;

class MedicalRecord extends Component
{
    public function render()
    {
        return view('livewire.dashboard.medical-record');
    }

    public function deleteMedicalFile($id)
    {

      
        $user = User::find($id);
        $user->update(['medical_record_path' => null]);
        $user->save();
       
    }
}
