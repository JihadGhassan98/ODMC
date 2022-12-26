<div>
<main class="home-page" dir="{{App::isLocale('ar')? 'rtl':'ltr'}}">
    <header class="home-page__hero">
        <div alt="" class="home-page__hero--bg">
        </div>
        <div class="home-page__hero--slug">
            <span class="slug-text">{{App::isLocale('ar')?'مكان رائع للعمل و أروع لتلقي العناية':'A Great Place to Work. A Great Place to Receive Care.'}}</span>
            <a href="#" class="slug-cta">{{App::isLocale('ar')? 'المزيد من المعلومات':'Learn More'}}</a>
        </div>
    </header>

    <section class="home-page__clinics">
     <span class="home-page__clinics--title">{{App::isLocale('ar')? 'العيادات ':'Clinics'}}</span>
     <div class="home-page__clinics--clinic-search">
        <input type="text" wire:model="searchKey" placeholder="{{App::isLocale('ar')? 'البحث عن عيادة':'Search for a clinic'}}" class="clinic-search-field">
        <select class="clinic-search-drop" wire:model="city_sort" wire:change="getClinics()" id="" class="clinic-sort">
            <option selected value="">{{App::isLocale('ar')? 'فرز حسب المدينة':'Sort By City'}}</option>
            @foreach($cities as $city)
            <option value="{{$city->id}}">{{App::isLocale('ar')? $city->name_ar:$city->name_en}}</option>
            @endforeach
        </select>
        <select class="clinic-search-drop" wire:model="categ_sort" wire:change="getClinics()" id="" class="clinic-sort">
            <option selected value="0">{{App::isLocale('ar')? 'فرز حسب الفئة':'Sort By Category'}}</option>
            @foreach($categs as $city)
            <option value="{{$city->id}}">{{App::isLocale('ar')? $city->name_ar:$city->name_en}}</option>
            @endforeach
        </select>
     </div>
<div class="home-page__clinics--clinic-items">
    @forelse($clinics as $clinic)
    <div class="clinic-item">
        <img  class="c-img"src="/userImages/{{$clinic->image}}" alt="">
       <span class="c-data"> {{App::isLocale('ar')? $clinic->name_ar:$clinic->name_en}}</span>
       <span class="c-data"> {{App::isLocale('ar')? $clinic->city_ar:$clinic->city_en}}</span>
       <span class="c-dates"> {{App::isLocale('ar')? $clinic->categ_ar:$clinic->categ_en}} </span>
       <span class="c-dates"> {{App::isLocale('ar')? $daysOfTheWeek_ar[$clinic->week_start]:$daysOfTheWeek[$clinic->week_start]}} - {{App::isLocale('ar')? $daysOfTheWeek_ar[$clinic->week_end]:$daysOfTheWeek[$clinic->week_end]}}</span>
       <span class="c-dates"> {{$clinic->day_start}} - {{$clinic->day_end}} </span>
       <a href="{{url('/clinicProfile/'.$clinic->id)}}" class="c-link">{{App::isLocale('ar')? 'عرض الخدمات':'View Services'}}</a>
    </div>
    @empty
<h1 class="clinic-not-found">{{App::isLocale('ar')? 'لا يوجد نتائج':'No Results'}}</h1>
    @endforelse
</div>
<div class="">{{$clinics->links()}}</div>

    </section>
    <section class="home-page__clinics">
     <span class="home-page__clinics--title">{{App::isLocale('ar')? 'العروض ':'Offers'}}</span>
     <div class="home-page__clinics--clinic-search">
        <input type="text" wire:model="s_searchKey" placeholder="{{App::isLocale('ar')? 'البحث عن خدمة':'Search for a service'}}" class="clinic-search-field">
        <select class="clinic-search-drop" wire:model="s_city_sort" wire:change="offers()" id="" class="clinic-sort">
            <option selected value="">{{App::isLocale('ar')? 'فرز حسب المدينة':'Sort By City'}}</option>
            @foreach($cities as $city)
            <option value="{{$city->id}}">{{App::isLocale('ar')? $city->name_ar:$city->name_en}}</option>
            @endforeach
        </select>
        <select class="clinic-search-drop" wire:model="s_categ_sort" wire:change="offers()" id="" class="clinic-sort">
            <option selected value="0">{{App::isLocale('ar')? 'فرز حسب الفئة':'Sort By Category'}}</option>
            @foreach($categs as $city)
            <option value="{{$city->id}}">{{App::isLocale('ar')? $city->name_ar:$city->name_en}}</option>
            @endforeach
        </select>
     </div>
<div class="home-page__clinics--clinic-items">
   @forelse($offers as $clinic)
   <div class="clinic-item">
    <img  class="c-img"src="/userImages/{{$clinic->logo}}" alt="">
   <span class="c-data"> {{App::isLocale('ar')? $clinic->name_ar:$clinic->name_en}}</span>
   <span class="c-data"> {{App::isLocale('ar')? $clinic->city_ar:$clinic->city_en}}</span>
   <span class="c-dates"> {{App::isLocale('ar')? $clinic->categ_ar:$clinic->categ_en}} </span>
   @if($clinic->discount == 0)
   <span class="c-dates normal-price"> {{$clinic->price}} {{App::isLocale('ar')? 'د.أ':'JOD'}} </span>
   @else
   <span class="c-dates offer-banner"> {{$clinic->price - ($clinic->price * ($clinic->discount / 100))}} {{App::isLocale('ar')? 'د.أ':'JOD'}} (- {{$clinic->discount}}%) </span>
   @endif
</div>
   @empty
<h1 class="clinic-not-found">{{App::isLocale('ar')? 'لا يوجد نتائج':'No Results'}}</h1>
   @endforelse
</div>

    </section>
</main>
</div>
