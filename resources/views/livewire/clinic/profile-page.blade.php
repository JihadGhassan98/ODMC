<div>
    <main class="clinic-profile" dir="{{App::isLocale('ar')? 'rtl':'ltr'}}">
        <div class="clinic-profile__heading">
            
            <img src="/userImages/{{$myClinic->image}}" alt="" class="clinic-profile__heading--image">
            <span  class="clinic-profile__heading--name">{{App::isLocale('ar')? $myClinic->name_ar:$myClinic->name_en}} <span class="name-edit"> </span></span>
            <div class="clinic-profile__heading--data">
                <div class="clinic-box">
                    <span class="clinic-label">{{App::isLocale('ar')? 'الدوام:':'Work Days'}}</span>
                    @if(App::isLocale('ar'))
                    <span class="clinic-field">{{$daysOfTheWeek_ar[$myClinic->week_start]}} - {{$daysOfTheWeek_ar[$myClinic->week_end]}}</span>
                    @else
                    <span class="clinic-field">{{$daysOfTheWeek[$myClinic->week_start]}} - {{$daysOfTheWeek[$myClinic->week_end]}}</span>

                    @endif
                    <span  class="clinic-cta"> </span>
                </div>
                <div  class="clinic-box">
                    <span class="clinic-label">{{App::isLocale('ar')? 'الساعات:':'Work hours'}}</span>
                    <span class="clinic-field">{{$myClinic->day_start}} - {{$myClinic->day_end}}</span>
                    
                </div>
                <div class="clinic-box">
                    <span class="clinic-label">{{App::isLocale('ar')? 'البريد الإلكتروني:':'Email Address:'}}</span>
                    <span class="clinic-field">{{$myClinic->email}}</span>
                    
                </div>
           
                <div  class="clinic-box">
                    <span class="clinic-label">{{App::isLocale('ar')? 'رقم الهاتف:':'Phone Number:'}}</span>
                    <span class="clinic-field">{{$myClinic->phone}}</span>
                    
                </div>
        
                <div class="clinic-box">
                    <span class="clinic-label">{{App::isLocale('ar')? 'تاريخ الإنضمام:':'Date Joined:'}}</span>
                    <span class="clinic-field">{{date_format($myClinic->created_at,'Y-d-m')}}</span>
                </div>
           
             
        
                <div class="clinic-box">
                    <span  class="clinic-label">{{App::isLocale('ar')? 'الفئة:':'Category:'}}</span>
                    <span class="clinic-field">{{App::isLocale('ar')? $myClinic->categ_ar:$myClinic->categ_en}}</span>
                    
                </div>
         
                <div class="clinic-box">
                    <span class="clinic-label">{{App::isLocale('ar')? 'المدينة:':'City:'}}</span>
                    <span class="clinic-field">{{App::isLocale('ar')? $myClinic->city_ar:$myClinic->city_en}}</span>
                    
                </div>
                <div class="clinic-box">
                    <span class="clinic-label">{{App::isLocale('ar')? 'المالك:':'Owner:'}}</span>
                    <span class="clinic-field">{{$myClinic->name}}</span>
                </div>
             
            </div>
        </div>
    <section class="home-page__clinics">
        <span class="home-page__clinics--title">{{App::isLocale('ar')? 'الخدمات':'Services'}}</span>
        
   <div class="home-page__clinics--clinic-items">
      @forelse($services as $service)
      <div class="clinic-item">
       <img  class="c-img"src="/userImages/{{$service->logo}}" alt="">
      <span class="c-data"> {{App::isLocale('ar')? $service->name_ar:$service->name_en}}</span>
      @if($service->discount == 0)
      <span class="c-dates normal-price"> {{$service->price}} {{App::isLocale('ar')? 'د.أ':'JOD'}} </span>
      @else
      <span class="c-dates offer-banner"> {{$service->price - ($service->price * ($service->discount / 100))}} {{App::isLocale('ar')? 'د.أ':'JOD'}} (- {{$service->discount}}%) </span>
      @endif
      <button class="c-cta" onclick="scroll_lock()" wire:click="showDialog({{$service->id}})">{{App::isLocale('ar')? 'احجز موعد':'Book A Session'}}</button>
   </div>
      @empty
   <h1 class="clinic-not-found">{{App::isLocale('ar')? 'لا يوجد نتائج':'No Results'}}</h1>
      @endforelse
   </div>
   
       </section>
    </main>
 @if($showDialog)
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
                @elseif($emptyData)
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
