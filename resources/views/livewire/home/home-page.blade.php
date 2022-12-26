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
   <button class="c-cta" onclick="scroll_lock()" wire:click="showDialog({{$clinic->id}})">{{App::isLocale('ar')? 'احجز موعد':'Book A Session'}}</button>
</div>
   @empty
<h1 class="clinic-not-found">{{App::isLocale('ar')? 'لا يوجد نتائج':'No Results'}}</h1>
   @endforelse
</div>

    </section>
</main>



@if($showDialog ==1)
<div class="universal-popup" >
 
    <div class="universal-popup__dialog-box">
        <div class="universal-popup__dialog-box--dialog-header">
        <span class="dialog-name">{{App::isLocale('ar')? 'تعديل معلومات العيادة':'Editing Clinic Information'}}</span>
        <button onclick="scroll_unlock()" wire:click = "hideDialog()" class="dialog-close"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div dir="{{App::isLocale('ar')? 'rtl':'ltr'}}" class="universal-popup__dialog-box--dialog-body">
            <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'التاريخ':'Date'}}</label>
            <input required wire:model="date" type="date" class="dialog-box-input">
            <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'الوقت':'Time'}}</label>
            <input required wire:model="time" type="time" class="dialog-box-input">
            <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'المدينة':'City'}}</label>
            <select dir="ltr" wire:model="city" class="dialog-box-input">
                @foreach($cities as $city)
                <option value="{{$city->id}}">{{App::isLocale('ar')? $city->name_ar:$city->name_en}}</option>
                @endforeach
            </select>
            <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'العنوان':'Address'}}</label>
            <input required wire:model="pickupAddress" type="text" class="dialog-box-input">
            <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'ملاحظات':'Notes'}}</label>
            <textarea required wire:model="note" type="text" class="dialog-box-input">
            </textarea>
       
        </div>
        <div class="dialog-ctas">
            @if($tooMany)
            <span class='booking-error'>{{App::isLocale('ar')? 'لا يمكن تسجيل الطلب ، يرجى المحاولة لاحقآ':'Cannot Save Session, Please Try Later'}} <button wire:click="refreshDialog()" class="refresh-dialog"><i class="fa fa-refresh" aria-hidden="true"></i></button></span>
            @elseif($wrongDay)
            <span class='booking-error'>{{App::isLocale('ar')?'لقد قمت باختيار يوم خارج ايام دوام العيادة':'You Have Chosen A Wrong Work Day'}} <button wire:click="refreshDialog()" class="refresh-dialog"><i class="fa fa-refresh" aria-hidden="true"></i></button></span>
            @elseif($wrongHour)
            <span class='booking-error'>{{App::isLocale('ar')? 'يرجى اختيار وقت ضمن ساعات دوام العيادة':'Please Consider The Working Hours'}} <button wire:click="refreshDialog()" class="refresh-dialog"><i class="fa fa-refresh" aria-hidden="true"></i></button></span>
            @else
        <button wire:click="Book()"  onclick="scroll_unlock()" class="dialog-btn dialog-confirm">{{App::isLocale('ar')? 'تأكيد':'Confirm'}}</button>
        @endif
        <button wire:click="hideDialog()" onclick="scroll_unlock()" class="dialog-btn dialog-cancel">{{App::isLocale('ar')? 'إلغاء':'Cancle'}}</button>
        </div>
         </div>
</div>
@endif
</div>
