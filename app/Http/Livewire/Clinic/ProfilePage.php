<?php

namespace App\Http\Livewire\Clinic;

use Livewire\Component;
use App\Models\Service;
use App\Models\Appointment;
use App\Models\Citie;
use App\Models\Clinic;
use DateTime;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

use function PHPUnit\Framework\containsIdentical;

class ProfilePage extends Component
{
    public $tooMany = 0;
    public $wrongDay = 0;
    public $emptyData = 0;
    public $wrongHour = 0;
    public $showDialog = 0;
    public $serviceID;
    public $date;
    public $city;
    public $time;
    public $note;
    public $pickupAddress;
    public $daysOfTheWeek =['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
    public $daysOfTheWeek_ar =['الأحد','الإثنين','الثلاثاء','الأربعاء','الخميس','الجمعة','السبت'];
    public function render()
    {
      
        return view('livewire.clinic.profile-page',[
            'myClinic'=>$this->myClinic(),
            'services'=>Service::where('active',1)->where('clinic_id',Session::get('CID'))->get(),
            'cities'=>Citie::where('active',1)->get(),
        ]);
       
    }
public function refreshDialog(){

     $this->tooMany = 0;
     $this->wrongDay = 0;
     $this->wrongHour = 0;
     $this->showDialog = 0;
}
    public function myClinic(){


        return Clinic::join('cities', 'clinics.city_id', 'cities.id')
        ->join('users', 'clinics.user_id', 'users.id')
        ->join('categories', 'clinics.category_id', 'categories.id')
        ->where('clinics.id', Session::get('CID'))->select([
            'cities.name_ar as city_ar',
            'cities.name_en as city_en',
            'clinics.*'
        ])
        ->select([
            'cities.name_ar as city_ar',
            'cities.name_en as city_en',
            'clinics.*',
            'users.name',
            'categories.name_ar as categ_ar',
            'categories.name_en as categ_en',
        ])->first();
    }

    public function showDialog($id){
        if(!Auth::check()){

            redirect()->to('/register');
  
          }
        $this->showDialog=1;
        $this->serviceID = $id;
    }
    public function hideDialog(){
        $this->showDialog=0;
        $this->serviceID = null;
    }
    public function Book(){
 
        if(!Auth::check()){

          redirect()->to('/register');

        }
        if($this->city&& $this->date&&$this->time&&$this->pickupAddress){

               

        }
        else{

          $this->emptyData =1;
          return;
          
        }
        $date1 = new DateTime($this->date);
    $date2 = new DateTime(date('Y-m-d') );
    
    $days = $date2->diff($date1)->format('%r%d');
    
    if($days === "-1"){
        // if($this->date == date('Y-m-d')){

            $this->wrongDay=1;


        }


        $service = Service::find($this->serviceID);
        $appointments = Appointment::where('clinic_id',$service->clinic_id)->where('status_id',3)->count();
        $clinic = Clinic::find($service->clinic_id);
        $appt_count = $clinic->appt_count;
        $w_d_s = $clinic->week_start; 
        $w_d_e = $clinic->week_end;
        $w_h_s= $clinic->day_start; 
        $w_h_e=$clinic->day_end;
        
       $day = date('l', strtotime($this->date));
       
       if(array_search($day,$this->daysOfTheWeek)){
        $index = array_search($day,$this->daysOfTheWeek);
        
        if($index >= $w_d_s && $index <= $w_d_e ){
         
          

                if($appointments == $clinic->appt_count){

                    $this->tooMany=1;
                }
                else{
                 Appointment::create([
                 'user_id'=>Auth::user()->id,
                 'city_id'=>$this->city,
                 'clinic_id'=>$clinic->id,
                 'date'=>$this->date,
                 'time'=>$this->time,
                 'pickup_address'=>$this->pickupAddress,
                 'note'=>$this->note,
                 'status_id'=>3,
                 'service_id'=>$this->serviceID,

                 ]);
                 $this->hideDialog();
                }

          





        }
        else {

         $this->wrongDay =1 ;

         return;

        }

       }





    }

}
