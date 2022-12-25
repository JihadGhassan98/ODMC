<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Service;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Blog;
use App\Models\Categorie;
use App\Models\Citie;
use Session;


class MyClinic extends Component
{
    public $daysOfTheWeek =['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
    public $daysOfTheWeek_ar =['الأحد','الإثنين','الثلاثاء','الأربعاء','الخميس','الجمعة','السبت'];
 public $name_ar;
 public $name_en;
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



        ]);
    }
    public function categs(){


        return Categorie::all();
    }
    public function cities(){

        return Citie::all();
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



    public function changeName(){
        $myClinic =  Clinic::where('user_id',Auth::user()->id)->first();
        $myClinic ->update([

            'name_en'=>$this->name_en,
            'name_ar'=>$this->name_ar,
        ]);
        $myClinic->save();
        $this->hideDialog();

    }
    public function createDoctor(){

        $myClinic =  Clinic::where('user_id',Auth::user()->id)->first();
        Doctor::create([

            'first_name'=>$this->d_fname,
            'last_name'=>$this->d_lname,
            'phone'=>$this->d_phone,
            'clinic_id'=>$myClinic->id,
        ]);

        $doc_count = Doctor::where('clinic_id',$myClinic->id)->count();
        $hrs_count = $myClinic->d_start->diff($myClinic->d_end);
        $myClinic->update([
            'appt_count'=>$doc_count*$hrs_count,
        ]);
        $myClinic->save();

    }
    // public function change(){
    // }
}
