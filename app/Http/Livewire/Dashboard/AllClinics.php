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
        return view('livewire.dashboard.all-clinics', [
            'pendingClinics' => $this->getPendingClinics(),
            'expiredClinics' => $this->getExpiredClinics(),
            'inActiveClinics' => $this->getInActiveClinics(),
            'activeClinics' => $this->getActiveClinics(),

        ]);
    }

    public function getPendingClinics()
    {

        if ($this->searchKey) {
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
                ->where('clinics.registration_date', null)
                ->distinct()
                ->select([
                    'cities.name_ar as city_ar',
                    'cities.name_en as city_en',
                    'clinics.*',
                    'users.name',
                    'categories.name_ar as categ_ar',
                    'categories.name_en as categ_en',
                    
                ])
                ->paginate(30);
        } else {

            return Clinic::join('cities', 'clinics.city_id', 'cities.id')
                ->join('users', 'clinics.user_id', 'users.id')
                ->join('categories', 'clinics.category_id', 'categories.id')
                ->where('clinics.registration_date', null)->select([
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
                ])->paginate(30);
        }
    }


    public function getExpiredClinics()
    {

        if ($this->searchKey) {
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
                ->where('clinics.expired', 1)
                ->select([
                    'cities.name_ar as city_ar',
                    'cities.name_en as city_en',
                    'clinics.*',
                    'users.id',
                    'categories.name_ar as categ_ar',
                    'categories.name_en as categ_en',
                ])
                ->distinct()
                ->paginate(30);
        } else {

            return Clinic::join('cities', 'clinics.city_id', 'cities.id')
                ->join('users', 'clinics.user_id', 'users.id')
                ->join('categories', 'clinics.category_id', 'categories.id')
                ->where('clinics.expired', 1)->select([
                    'cities.name_ar as city_ar',
                    'cities.name_en as city_en',
                    'clinics.*',
                    'users.id',
                    'categories.name_ar as categ_ar',
                    'categories.name_en as categ_en',
                ])->paginate(30);
        }
    }

    public function getInActiveClinics()
    {



        if ($this->searchKey) {
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
                ->where('clinics.active', 0)
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
        } else {

            return Clinic::join('cities', 'clinics.city_id', 'cities.id')
                ->join('users', 'clinics.user_id', 'users.id')
                ->join('categories', 'clinics.category_id', 'categories.id')
                ->where('clinics.active', 0)->select([
                    'cities.name_ar as city_ar',
                    'cities.name_en as city_en',
                    'clinics.*',
                    'users.name',
                    'categories.name_ar as categ_ar',
                    'categories.name_en as categ_en',
                ])->paginate(30);
        }
    }
    public function getActiveClinics()
    {



        if ($this->searchKey) {
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
        } else {

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

    public function rejectClinic($id)
    {
        $clinic = Clinic::find($id);
        

    }
    public function acceptClinic($id)
    {


        $year = date('Y');
        $day = date('d');
        $month = date('m');
        $registration = $year . '-' . $month . '-' . $day;
        $date = date_create($registration);
        date_format($date, "Y-m-d");
        $expiration = date_add($date, date_interval_create_from_date_string("30 days"));

        $clinic = Clinic::find($id);

        $clinic->update([
         'registration_date'=>$registration,
         'expiration_date'=>$expiration,
         'active'=>1


        ]);
        $clinic->save();

        

    }
}
