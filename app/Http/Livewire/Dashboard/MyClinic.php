<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Service;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Appointment_statuse;
use App\Models\Blog;
use App\Models\Categorie;
use App\Models\Citie;
use App\Models\Volunteer;
use DateTime;
use Ramsey\Uuid\Type\Time;
use Session;


class MyClinic extends Component
{
    public $daysOfTheWeek =['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
    public $daysOfTheWeek_ar =['الأحد','الإثنين','الثلاثاء','الأربعاء','الخميس','الجمعة','السبت'];
 public $name_ar;
 public $name_en;
 public $d_fname;
 public $d_lname;
 public $d_phone;
 public $w_d_s;
 public $w_d_e;
 public $w_h_s;
 public $w_h_e;
 public $email;
 public $phone;
 public $categ;
 public $city;
 public $s_ar;
 public $s_en;
 public $price;
 public $discount;
 public $doctor_id;
 public $status_id;
    public $showDialog ;
    public $editCase;
    public function render()
    {
        return view('livewire.dashboard.my-clinic',[
        'clinic'=>$this->getClinic(),
        'services'=>$this->getServices(),
        'doctors'=>$this->getDoctors(),
        'blogs'=>$this->getBlogs(),
        'cities'=>$this->cities(),
        'categs'=>$this->categs(),
        'appointments'=>$this->getPendingAppointments(),
        'status'=>$this->getStatus(),



        ]);
    }
    public function getStatus(){

        return Appointment_statuse::all();
    }
    public function getPendingAppointments(){

        $myClinic =  Clinic::where('user_id',Auth::user()->id)->first();

        return Appointment::join('cities', 'appointments.city_id', 'cities.id')
        ->join('clinics', 'appointments.clinic_id', 'clinics.id')
        ->join('services', 'appointments.service_id', 'services.id')
        ->join('users', 'appointments.user_id', 'users.id')
        ->join('appointment_statuses', 'appointments.status_id', 'appointment_statuses.id')
        ->where('appointments.clinic_id',$myClinic->id)
        ->where('appointments.status_id',3)
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
    public function assignDoctor($apt_id){

        $apt = Appointment::find($apt_id);

        $apt->update([

     'doctor_id'=>$this->doctor_id,

        ]);
        $apt->save();
        $this->doctor_id=null;

    }
    public function changeAptStatus($apt_id){
        $apt = Appointment::find($apt_id);

        $apt->update([

     'status_id'=>$this->status_id,

        ]);
        $apt->save();

        if($apt->volunteer_id != null && ($this->status_id == 1)){
         $v= Volunteer::find($apt->volunteer_id);

         $v->update([
          'points'=> $v->points+=100,


         ]);


        }

        $this->status_id=null;


    }
    public function categs(){


        return Categorie::all();
    }
    public function cities(){

        return Citie::all();
    }
    public function getVolunteerData($id){

        return Volunteer::join('users','volunteers.user_id','users.id')->first();


    }
    public function getDoctorData($id){

        return Doctor::where('id',$id)->first();


    }
public function getClinic(){


    return Clinic::join('cities', 'clinics.city_id', 'cities.id')
    ->join('users', 'clinics.user_id', 'users.id')
    ->join('categories', 'clinics.category_id', 'categories.id')
    ->where('clinics.user_id', Auth::user()->id)->select([
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
    public function getServices(){

       $myClinic =  Clinic::where('user_id',Auth::user()->id)->first();
       return Service::where('clinic_id',$myClinic->id)->get();


    }
    public function getDoctors(){

       $myClinic =  Clinic::where('user_id',Auth::user()->id)->first();
       return Doctor::where('clinic_id',$myClinic->id)->get();


    }
    public function getBlogs(){

       $myClinic =  Clinic::where('user_id',Auth::user()->id)->first();
       return Blog::where('clinic_id',$myClinic->id)->get();


    }

    public function showDialog($val,$s=0){

        $this->showDialog= 1;
        $this->editCase =$val;
        if($s != 0){

            Session::put('SID',$s);
            Session::put('DID',$s);
      



        }
    }
    public function hideDialog(){

        $this->showDialog= null;
        $this->editCase =null;
    }


    public function serviceStats($id){
        $serv = Service::find($id);
        if($serv->active == 1){
        $serv->update([

            'active'=>0
        ]);
    }
    else{
        $serv->update([

            'active'=>1
        ]);


    }
    }
    public function createService(){
        $myClinic =  Clinic::where('user_id',Auth::user()->id)->first();
     Service::create([
      'name_ar'=>$this->s_ar,
      'clinic_id'=>$myClinic->id,
      'name_en'=>$this->s_en,
      'price'=>$this->price,
      'discount'=>$this->discount,
     ]);

     $this->hideDialog();
     $this->s_ar  = null;
     $this->s_en  = null;
     $this->price = null;
     $this->discount = null;


    }

    public function editService(){
        $myClinic =  Clinic::where('user_id',Auth::user()->id)->first();
     $srv = Service::find(Session::get('SID'));
     if($this->s_ar != null){
        $srv->update([
            'name_ar'=>$this->s_ar,
           
          
           ]);

     }
     if($this->s_en != null){

        $srv->update([
          
         
            'name_en'=>$this->s_en,
          
           ]);
     }
     if($this->price != null){
        $srv->update([
        
            'price'=>$this->price,
        
           ]);

     }
     if($this->discount != null){

        $srv->update([
        
            'discount'=>$this->discount,
           ]);

     }
    

     $this->hideDialog();



    }
    public function editDoctor(){
     $doc = Doctor::find(Session::get('DID'));
     if($this->d_fname != null){
        $doc->update([
            'first_name'=>$this->d_fname,
           
          
           ]);

     }
     if($this->d_lname != null){

        $doc->update([
          
         
            'last_name'=>$this->d_lname,
          
           ]);
     }
     if($this->d_phone != null){
        $doc->update([
        
            'phone'=>$this->d_phone,
        
           ]);

     }
    
    

     $this->hideDialog();



    }



    public function changeName(){
        $myClinic =  Clinic::where('user_id',Auth::user()->id)->first();
        $myClinic ->update([

            'name_en'=>$this->name_en,
            'name_ar'=>$this->name_ar,
        ]);
        $myClinic->save();
        $this->hideDialog();

    }
    public function changeHours(){
        $myClinic =  Clinic::where('user_id',Auth::user()->id)->first();
        $myClinic->update([
            // 'week_start'=>$this->w_d_s,
            // 'week_end'=>$this->w_d_e,
            'day_start'=>$this->w_h_s,
            'day_end'=>$this->w_h_e,
        ]);
        $this->hideDialog();

    }
    public function changeDays(){
        $myClinic =  Clinic::where('user_id',Auth::user()->id)->first();
        $myClinic->update([
            'week_start'=>$this->w_d_s,
            'week_end'=>$this->w_d_e,
            // 'day_start'=>$this->w_h_s,
            // 'day_end'=>$this->w_h_e,
        ]);
        $this->hideDialog();

    }
    public function saveDoctor(){

        $myClinic =  Clinic::where('user_id',Auth::user()->id)->first();
        Doctor::create([

            'first_name'=>$this->d_fname,
            'last_name'=>$this->d_lname,
            'phone'=>$this->d_phone,
            'clinic_id'=>$myClinic->id,
        ]);

        $doc_count = Doctor::where('clinic_id',$myClinic->id)->count();
       
        $s = $myClinic->day_start;
        $e = $myClinic->day_end;
       
        $starttimestamp = strtotime($s);
        $endtimestamp = strtotime($e);
        $difference = abs($endtimestamp - $starttimestamp)/3600;
    
        $myClinic->update([
            'appt_count'=>$doc_count*$difference,
        ]);
        $myClinic->save();
        $this->hideDialog();
        $this->d_fname=null;
        $this->d_lname=null;
        $this->d_phone=null;
    }
    public function changeCateg(){
        $myClinic =  Clinic::where('user_id',Auth::user()->id)->first();
        $myClinic->update([
            'category_id'=>$this->categ,
        ]);
        $myClinic->save();
        $this->hideDialog();
    }
    public function changePhone(){
        $myClinic =  Clinic::where('user_id',Auth::user()->id)->first();
        $myClinic->update([
            'phone'=>$this->phone,
        ]);
        $myClinic->save();
        $this->hideDialog();
    }
    public function changeEmail(){
        $myClinic =  Clinic::where('user_id',Auth::user()->id)->first();
        $myClinic->update([
            'email'=>$this->email,
        ]);
        $myClinic->save();
        $this->hideDialog();
    }
    public function changeCity(){
        $myClinic =  Clinic::where('user_id',Auth::user()->id)->first();
        $myClinic->update([
            'city_id'=>$this->city,
        ]);
        $myClinic->save();
        $this->hideDialog();
    }
    public function turnOffDoc($id){

        $doc= Doctor::find($id);
        if($doc->active == 1){
        $doc->update([
            'active'=>0
        ]);}
        else{
        $doc->update([
            'active'=>1
        ]);
    }
    }
}
