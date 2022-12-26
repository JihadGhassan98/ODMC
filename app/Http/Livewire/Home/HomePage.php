<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Models\Clinic;
use Livewire\WithPagination;
use App\Models\Categorie;
use App\Models\Citie;
use App\Models\Service;

class HomePage extends Component
{
    use WithPagination;
    public $searchKey;
    public $city_sort=0;
    public $categ_sort=0;
    public $s_searchKey;
    public $s_city_sort=0;
    public $s_categ_sort=0;
    public $daysOfTheWeek =['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
    public $daysOfTheWeek_ar =['الأحد','الإثنين','الثلاثاء','الأربعاء','الخميس','الجمعة','السبت'];
    public function render()
    {
        return view('livewire.home.home-page',[

        'clinics'=>$this->getClinics(),
        'cities'=>$this->cities(),
        'categs'=>$this->categs(),
        'offers'=>$this->offers(),

        ]);
    }
    public function offers(){
        if($this->s_searchKey){
$this->s_categ_sort =0;;
$this->s_city_sort=0;;
            return  Service::join('clinics', 'services.clinic_id', 'clinics.id')
            ->join('cities', 'clinics.city_id', 'cities.id')
            ->join('users', 'clinics.user_id', 'users.id')
            ->join('categories', 'clinics.category_id', 'categories.id')
            ->where(function ($q) {
                $q
                    ->Where('clinics.name_ar', 'like', '%' . $this->s_searchKey . '%')
                    ->orWhere('clinics.name_en', 'like', '%' . $this->s_searchKey . '%')
                    ->orWhere('services.name_ar', 'like', '%' . $this->s_searchKey . '%')
                    ->orWhere('services.name_en', 'like', '%' . $this->s_searchKey . '%')
                 ;
            })
            ->where('services.active',1)
            ->where('clinics.active',1)
            ->where('services.discount','>',0)
            ->select([
                'cities.name_ar as city_ar',
                'cities.name_en as city_en',
                'clinics.name_ar as clinic_ar',
                'clinics.name_en as clinic_en',
                'clinics.image as logo',
                'users.name',
                'categories.name_ar as categ_ar',
                'categories.name_en as categ_en',
                'services.*'
            ])
            ->distinct()
            ->paginate(30);

        }
      if($this->s_categ_sort != 0 && $this->s_city_sort != 0){

        return Service::join('clinics', 'services.clinic_id', 'clinics.id')
        ->join('cities', 'clinics.city_id', 'cities.id')
        ->join('users', 'clinics.user_id', 'users.id')
        ->join('categories', 'clinics.category_id', 'categories.id')
        ->where('clinics.city_id',$this->s_city_sort)
        ->where('clinics.category_id',$this->s_categ_sort)
        ->where('services.active',1)
        ->where('clinics.active',1)
        ->where('services.discount','>',0)->select('cities.name_ar as city_ar',
        'cities.name_en as city_en',
        'clinics.name_ar as clinic_ar',
        'clinics.name_en as clinic_en',
        'clinics.image as logo',
        'users.name',
        'categories.name_ar as categ_ar',
        'categories.name_en as categ_en',
        'services.*')->paginate(30);

      }
       else if($this->s_city_sort != 0){
        return Service::join('clinics', 'services.clinic_id', 'clinics.id')
        ->join('cities', 'clinics.city_id', 'cities.id')
        ->join('users', 'clinics.user_id', 'users.id')
        ->join('categories', 'clinics.category_id', 'categories.id')
        ->where('clinics.city_id',$this->s_city_sort)
        ->where('services.active',1)
        ->where('clinics.active',1)
        ->where('services.discount','>',0)->select('cities.name_ar as city_ar',
        'cities.name_en as city_en',
        'clinics.name_ar as clinic_ar',
        'clinics.name_en as clinic_en',
        'clinics.image as logo',
        'users.name',
        'categories.name_ar as categ_ar',
        'categories.name_en as categ_en',
        'services.*')->paginate(30);
        }
        else if($this->s_categ_sort != 0){

            return Service::join('clinics', 'services.clinic_id', 'clinics.id')
            ->join('cities', 'clinics.city_id', 'cities.id')
            ->join('users', 'clinics.user_id', 'users.id')
            ->join('categories', 'clinics.category_id', 'categories.id')
            ->where('clinics.category_id',$this->s_categ_sort)
            ->where('services.active',1)
            ->where('clinics.active',1)
            ->where('services.discount','>',0)
            ->select('cities.name_ar as city_ar',
            'cities.name_en as city_en',
            'clinics.name_ar as clinic_ar',
            'clinics.name_en as clinic_en',
            'clinics.image as logo',
            'users.name',
            'categories.name_ar as categ_ar',
            'categories.name_en as categ_en',
            'services.*')->paginate(30);

        }
        else {

            return Service::join('clinics', 'services.clinic_id', 'clinics.id')
            ->join('cities', 'clinics.city_id', 'cities.id')
            ->join('users', 'clinics.user_id', 'users.id')
            ->join('categories', 'clinics.category_id', 'categories.id')
            ->where('services.active',1)
            ->where('clinics.active',1)
            ->where('services.discount','>',0)
            ->select('cities.name_ar as city_ar',
            'cities.name_en as city_en',
            'clinics.name_ar as clinic_ar',
            'clinics.name_en as clinic_en',
            'clinics.image as logo',
            'users.name',
            'categories.name_ar as categ_ar',
            'categories.name_en as categ_en',
            'services.*')->paginate(30);

        }
     
    }
    public function categs(){


        return Categorie::all();
    }
    public function cities(){

        return Citie::all();
    }

    public function getClinics()
    {

        if ($this->searchKey) {
            $this->city_sort =0;
            $this->categ_sort=0;
            return Clinic::join('cities', 'clinics.city_id', 'cities.id')
                ->join('users', 'clinics.user_id', 'users.id')
                ->join('categories', 'clinics.category_id', 'categories.id')
                ->where(function ($q) {
                    $q
                        ->Where('clinics.name_ar', 'like', '%' . $this->searchKey . '%')
                        ->orWhere('clinics.name_en', 'like', '%' . $this->searchKey . '%')
                        ->orWhere('clinics.email', 'like', '%' . $this->searchKey . '%')
                        ->orWhere('clinics.phone', 'like', '%' . $this->searchKey . '%');
                })
                ->where('clinics.active', 1)
                ->where('clinics.expired', 0)
                ->select([
                    'cities.name_ar as city_ar',
                    'cities.name_en as city_en',
                    'clinics.*',
                    'users.name',
                    'categories.name_ar as categ_ar',
                    'categories.name_en as categ_en',
                ])
                ->distinct()
                ->paginate(30);
        }

        if($this->city_sort != 0 && $this->categ_sort !=0){
            return Clinic::join('cities', 'clinics.city_id', 'cities.id')
            ->join('users', 'clinics.user_id', 'users.id')
            ->join('categories', 'clinics.category_id', 'categories.id')
            ->where('clinics.active', 1)
            ->where('city_id',$this->city_sort)
            ->where('category_id',$this->categ_sort)
            ->select([
                'cities.name_ar as city_ar',
                'cities.name_en as city_en',
                'clinics.*',
                'users.name',
                'categories.name_ar as categ_ar',
                'categories.name_en as categ_en',
            ])->paginate(30);
        }
        else if($this->city_sort != 0){

            return Clinic::join('cities', 'clinics.city_id', 'cities.id')
            ->join('users', 'clinics.user_id', 'users.id')
            ->join('categories', 'clinics.category_id', 'categories.id')
            ->where('clinics.active', 1)
            ->where('city_id',$this->city_sort)->select([
                'cities.name_ar as city_ar',
                'cities.name_en as city_en',
                'clinics.*',
                'users.name',
                'categories.name_ar as categ_ar',
                'categories.name_en as categ_en',
            ])->paginate(30);

        }
        else if($this->categ_sort != 0){

            return Clinic::join('cities', 'clinics.city_id', 'cities.id')
            ->join('users', 'clinics.user_id', 'users.id')
            ->join('categories', 'clinics.category_id', 'categories.id')
            ->where('clinics.active', 1)
            ->where('category_id',$this->categ_sort)->select([
                'cities.name_ar as city_ar',
                'cities.name_en as city_en',
                'clinics.*',
                'users.name',
                'categories.name_ar as categ_ar',
                'categories.name_en as categ_en',
            ])->paginate(30);

        }
      

        else {

            return Clinic::join('cities', 'clinics.city_id', 'cities.id')
                ->join('users', 'clinics.user_id', 'users.id')
                ->join('categories', 'clinics.category_id', 'categories.id')
                ->where('clinics.active', 1)->select([
                    'cities.name_ar as city_ar',
                    'cities.name_en as city_en',
                    'clinics.*',
                    'users.name',
                    'categories.name_ar as categ_ar',
                    'categories.name_en as categ_en',
                ])->paginate(30);
        }
    }



    public function checkExpiredClinics(){

        $clinics = Clinic::all();
        
        $year = date('Y');
        $day = date('d');
        $month = date('m');
        $currentDate = $year . '-' . $month . '-' . $day;
        
   



        foreach ($clinics as $clinic) {
           
            if($clinic->expiration_date == $currentDate){

    

                $clinic->update([
                 
                    'expired'=>1,
                    'active'=>0

                ]);
                $clinic->save();

            }
            else{
              continue;
            }
        }

    }
}
