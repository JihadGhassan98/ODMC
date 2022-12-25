<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Clinic;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app',[

        'clinic'=>$this->getClinic(),

        ]);
    }
    public function getClinic(){
if(Auth::user()->type==3 || Auth::user()->type==4 )
return Clinic::where('user_id',Auth::user()->id)->first();
else return 0;
    }
    
}
