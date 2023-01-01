<div>
    <main class="my-clinic" dir="{{App::isLocale('ar')? 'rtl':'ltr'}}">

        <div class="my-clinic__heading">
            
            <img src="/userImages/{{$clinic->image}}" alt="" class="my-clinic__heading--image">
            <span wire:click="showDialog(1)" onclick="scroll_lock()" class="my-clinic__heading--name">{{App::isLocale('ar')? $clinic->name_ar:$clinic->name_en}} <span class="name-edit"><i class="fa fa-edit" aria-hidden="true"></i></span></span>
            <div class="my-clinic__heading--data">
                <div wire:click="showDialog(2)" onclick="scroll_lock()" class="clinic-box">
                    <span class="clinic-label">{{App::isLocale('ar')? 'الدوام:':'Work Days'}}</span>
                    @if(App::isLocale('ar'))
                    <span class="clinic-field">{{$daysOfTheWeek_ar[$clinic->week_start]}} - {{$daysOfTheWeek_ar[$clinic->week_end]}}</span>
                    @else
                    <span class="clinic-field">{{$daysOfTheWeek[$clinic->week_start]}} - {{$daysOfTheWeek[$clinic->week_end]}}</span>

                    @endif
                    <span  class="clinic-cta"><i class="fa fa-edit" aria-hidden="true"></i></span>
                </div>
                <div wire:click="showDialog(3)" onclick="scroll_lock()" class="clinic-box">
                    <span class="clinic-label">{{App::isLocale('ar')? 'الساعات:':'Work hours'}}</span>
                    <span class="clinic-field">{{$clinic->day_start}} - {{$clinic->day_end}}</span>
                    <span class="clinic-cta"><i class="fa fa-edit" aria-hidden="true"></i></span>
                </div>
                <div wire:click="showDialog(4)" onclick="scroll_lock()" class="clinic-box">
                    <span class="clinic-label">{{App::isLocale('ar')? 'البريد الإلكتروني:':'Email Address:'}}</span>
                    <span class="clinic-field">{{$clinic->email}}</span>
                    <span class="clinic-cta"><i class="fa fa-edit" aria-hidden="true"></i></span>
                </div>
           
                <div wire:click="showDialog(5)" onclick="scroll_lock()" class="clinic-box">
                    <span class="clinic-label">{{App::isLocale('ar')? 'رقم الهاتف:':'Phone Number:'}}</span>
                    <span class="clinic-field">{{$clinic->phone}}</span>
                    <span class="clinic-cta"><i class="fa fa-edit" aria-hidden="true"></i></span>
                </div>
        
                <div class="clinic-box">
                    <span class="clinic-label">{{App::isLocale('ar')? 'تاريخ الإنضمام:':'Date Joined:'}}</span>
                    <span class="clinic-field">{{date_format($clinic->created_at,'Y-d-m')}}</span>
                </div>
           
                <div class="clinic-box">
                    <span class="clinic-label">{{App::isLocale('ar')? 'تاريخ الانتهاء:':'Expiration Date:'}}</span>
                    <span class="clinic-field {{$clinic->expired == 1? 'expired':'not-expired'}}">{{$clinic->expiration_date}}</span>
                </div>
        
                <div wire:click="showDialog(6)" onclick="scroll_lock()" class="clinic-box">
                    <span  class="clinic-label">{{App::isLocale('ar')? 'الفئة:':'Category:'}}</span>
                    <span class="clinic-field">{{App::isLocale('ar')? $clinic->categ_ar:$clinic->categ_en}}</span>
                    <span class="clinic-cta"><i class="fa fa-edit" aria-hidden="true"></i></span>
                </div>
         
                <div wire:click="showDialog(7)" onclick="scroll_lock()" class="clinic-box">
                    <span class="clinic-label">{{App::isLocale('ar')? 'المدينة:':'City:'}}</span>
                    <span class="clinic-field">{{App::isLocale('ar')? $clinic->city_ar:$clinic->city_en}}</span>
                    <span class="clinic-cta"><i class="fa fa-edit" aria-hidden="true"></i></span>
                </div>
                <div class="clinic-box">
                    <span class="clinic-label">{{App::isLocale('ar')? 'المالك:':'Owner:'}}</span>
                    <span class="clinic-field">{{$clinic->name}}</span>
                </div>
                <div class="clinic-box">
                    <span class="clinic-label">{{App::isLocale('ar')? 'الحالة:':'Status:'}}</span>
                    @if(App::isLocale('en'))
                    <span class="clinic-field {{$clinic->active ? 'not-expired':'expired'}}">{{$clinic->active ? 'Active':'In-Active'}}</span>
                @else
                <span class="clinic-field {{$clinic->active ? 'not-expired':'expired'}}">{{$clinic->active ? 'فعالة':'غير فعالة'}}</span>

                @endif
                </div>
                <div class="clinic-box-report-cta">
<a href="{{url('clinicReport/'.$clinic->id)}}" class="link-report">{{App::isLocale('ar')? 'عرض التقارير':'Show Clinic Reports'}}</a>
                </div>
            </div>
        </div>
        <div class="my-clinic__section">
            <h1 class="my-clinic__section--head-text">{{App::isLocale('ar')? 'الخدمات':'Services'}}</h1>
            <div class="my-clinic__section--services">
                @forelse($services as $service)
                <div wire:click="showDialog(9,{{$service->id}})" onclick="scroll_lock()" class="service-card">
                    <span class="service-name">{{App::isLocale('ar')? $service->name_ar:$service->name_en}}</span>
                    <span class="service-data">{{number_format($service->price,2)}} {{App::isLocale('ar')? 'د.أ':'JOD'}}</span>
                    <span class="service-data">{{$service->discount}}%</span>
                    <button wire:click="serviceStats({{$service->id}})" class="service-cta {{$service->active ? 'not-expired':'expired'}}"><i class="fa fa-power-off" aria-hidden="true"></i></button>
                </div>
                @empty
                <span class="no-services">{{App::isLocale('ar')? 'لا يوجد خدمات':'No Services'}}</span>
                @endforelse
            </div>
            <button wire:click="showDialog(8)" onclick="scroll_lock()" class="add-service">{{App::isLocale('ar')? 'إضافة':'Add'}}</button>
        </div>

        <div class="my-clinic__section">
            <h1 class="my-clinic__section--head-text">{{App::isLocale('ar')? 'الأطباء':'Doctors'}}</h1>
            <div class="my-clinic__section--doctors">
<div class="doctors-header">
    <span class="doctors-head-cell">{{App::isLocale('ar')? 'الإسم الأول':'First Name'}}</span>
    <span class="doctors-head-cell">{{App::isLocale('ar')? 'الإسم الأخير':'Last Name'}}</span>
    <span class="doctors-head-cell">{{App::isLocale('ar')? 'الهاتف':'Phone'}}</span>
    <span class="doctors-head-cell">{{App::isLocale('ar')? 'الخيارات':'Options'}}</span>
</div>
                @forelse($doctors as $doctor)
            <div class="doctors-line">
                <span class="doctors-cell">{{$doctor->first_name}}</span>
                <span class="doctors-cell">{{$doctor->last_name}}</span>
                <span class="doctors-cell">{{$doctor->phone}}</span>
                <span class="doctors-ctas">
                    <button wire:click="turnOffDoc({{$doctor->id}})" class="doctors-cta {{$doctor->active? '':'doctors-in-active'}}"><i class="fa fa-power-off" aria-hidden="true"></i></button>
                    <button  wire:click="showDialog(11,{{$doctor->id}})" onclick="scroll_lock()" class="doctors-cta"><i class="fa fa-edit" aria-hidden="true"></i></button>
                </span>
            </div>
                
                @empty
                <span class="no-services">{{App::isLocale('ar')? 'لا يوجد أطباء':'No Doctors'}}</span>
                @endforelse
            </div>
            <button wire:click="showDialog(10)" onclick="scroll_lock()" class="add-service">{{App::isLocale('ar')? 'إضافة':'Add'}}</button>
        </div>
        <div class="my-clinic__section">
            <h1 class="my-clinic__section--head-text">{{App::isLocale('ar')? 'مواعيد قادمة':'Upcoming Appointments'}}</h1>
            <div class="my-appointments__appointments">
                @forelse($appointments as $appt)
        <div class="my-appointments__appointments--appointment" dir="{{App::isLocale('ar')? 'rtl':'ltr'}}">
            <span class="appt-data">{{App::isLocale('ar')? $appt->username:$appt->username}}</span>
            <span class="appt-data">{{App::isLocale('ar')? $appt->useremail:$appt->useremail}}</span>
            <span class="appt-data">{{App::isLocale('ar')? $appt->userphone:$appt->userphone}}</span>
            <span class="appt-data">{{App::isLocale('ar')? $appt->city_ar:$appt->city_en}}</span>
            <span class="appt-data">{{App::isLocale('ar')? $appt->city_ar:$appt->city_en}}</span>
            <span class="appt-data">{{App::isLocale('ar')? $appt->clinic_ar:$appt->clinic_en}}</span>
            <span class="appt-data">{{$appt->date}}</span>
            <span class="appt-data">{{$appt->time}}</span>
            <span class="appt-data">{{App::isLocale('ar')? $appt->service_ar:$appt->service_en}}</span>
            <span class="appt-data">{{$appt->pickup_address}}</span>
            <span class="appt-data">{{App::isLocale('ar')? $appt->status_ar:$appt->status_en}}</span>
            <span class="appt-data">@if($appt->note) {{$appt->note }} @else ------- @endif</span>
            <span class="appt-data">@if($appt->doctor_id) {{$this->getDoctorData($appt->doctor_id)->first_name . ' '.$this->getDoctorData($appt->doctor_id)->last_name  }} @else ------- @endif</span>
            <span class="appt-data">@if($appt->volunteer_id) {{$this->getVolunteerData($appt->volunteer_id)->name . ' '.$this->getVolunteerData($appt->volunteer_id)->phone  }} @else ------- @endif</span>
            <span class="appt-data">
                <select wire:model="doctor_id" wire:change="assignDoctor({{$appt->id}})" >
                <option value="">{{App::isLocale('ar')? '--اختر طبيبآ--':'--Choose A Doctor--'}}</option>
               @foreach($doctors as $doc)
                <option value="{{$doc->id}}">{{$doc->first_name .' '.$doc->last_name}}</option>
                @endforeach    
            </select>
            </span>
            <span class="appt-data">
                <select wire:model="status_id" wire:change="changeAptStatus({{$appt->id}})" >
                <option value="">{{App::isLocale('ar')? '--اختر حالة--':'--Choose A Status--'}}</option>
               @foreach($status as $doc)
                <option value="{{$doc->id}}">{{App::isLocale('ar')? $doc->name_ar : $doc->name_en  }}</option>
                @endforeach    
            </select>
            </span>
            <span class="user-medical-status">{{App::isLocale('ar')? 'معلومات المريض الطبية':'Patient Medical Information'}}</span>
            <span class="appt-data">
                <span class="appt-data-label">{{App::isLocale('ar')? 'الحساسيات':'Allergies'}}</span>
                @forelse($this->getAllergies($appt->user_id) as $item)
                <span>{{App::isLocale('ar')? $item->name_ar:$item->name_en}}</span>
                @empty
                ----------
                @endforelse
            </span>
            <span class="appt-data">
                <span class="appt-data-label">{{App::isLocale('ar')? 'الإعاقات':'Disabilities'}}</span>
                @forelse($this->getDisabs($appt->user_id) as $item)
                <span>{{ $item->name}}</span>
                @empty
                ----------
                @endforelse
            </span>
            <span class="appt-data">
                <span class="appt-data-label">{{App::isLocale('ar')? 'الأدوية':'Drugs'}}</span>
                @forelse( $this->getDrugs($appt->user_id) as $item)
                <span>{{ $item->name}}</span>


                @empty
                ----------
                @endforelse
            </span>
            <span class="appt-data">
                <span class="appt-data-label">{{App::isLocale('ar')? 'الأمراض المزمنة':'Choronic Diseases'}}</span>
                @forelse($this->getCD($appt->user_id) as $item)
                <span>{{ $item->name}}</span>
                

                @empty
                ----------
                @endforelse
            </span>
            <span class="appt-data-file">
                @if($appt->user_MR)
                <a href="/medicalReports/{{$appt->user_MR}}" download class="file-link">{{App::isLocale('ar')? 'عرض الملف الطبي':'Show Medical Record'}}</a>
                @else
                <button disabled class="file-link">{{App::isLocale('ar')? 'لا يوجد سجل طبي':'No Record To View'}}</button>
                @endif
            </span>
        
        </div>
        @empty
        <h1 class="no-appt">{{App::isLocale('ar')? 'لا نتائج':'No Results'}}</h1>
        @endforelse
        
            </div>
        </div>
    </main>



    @if($showDialog)
 
    <div class="universal-popup" >
        @switch($editCase)
        @case(1)
        <div class="universal-popup__dialog-box">
            <div class="universal-popup__dialog-box--dialog-header">
            <span class="dialog-name">{{App::isLocale('ar')? 'تعديل معلومات العيادة':'Editing Clinic Information'}}</span>
            <button onclick="scroll_unlock()" wire:click = "hideDialog()" class="dialog-close"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div dir="{{App::isLocale('ar')? 'rtl':'ltr'}}" class="universal-popup__dialog-box--dialog-body">
                <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'الاسم الجديد':'New Name'}}</label>
                <input wire:model="name_ar" type="text" class="dialog-box-input">
                <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'الإسم الجديد بالإنجليزية':'New Name In English'}}</label>
                <input wire:model="name_en" type="text" class="dialog-box-input">
            </div>
            <div class="dialog-ctas">
            <button wire:click="changeName()" class="dialog-btn dialog-confirm">{{App::isLocale('ar')? 'تأكيد':'Confirm'}}</button>
            <button wire:click="hideDialog()" onclick="scroll_unlock()" class="dialog-btn dialog-cancel">{{App::isLocale('ar')? 'إلغاء':'Cancle'}}</button>
            </div>
             </div>
        @break;
        @case(2)
        <div class="universal-popup__dialog-box">
            <div class="universal-popup__dialog-box--dialog-header">
            <span class="dialog-name">{{App::isLocale('ar')? 'تعديل معلومات العيادة':'Editing Clinic Information'}}</span>
            <button onclick="scroll_unlock()" wire:click = "hideDialog()" class="dialog-close"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div dir="{{App::isLocale('ar')? 'rtl':'ltr'}}" class="universal-popup__dialog-box--dialog-body">
                <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'بداية الأسبوع':'Week Start'}}</label>
                <select dir="ltr" wire:model="w_d_s" type="text" class="dialog-box-input">
                    @for($i =0 ;$i <= count($daysOfTheWeek)-1 ;$i++)
                    <option selected value="{{$i}}">{{App::isLocale('ar')? $daysOfTheWeek_ar[$i]:$daysOfTheWeek[$i]}}</option>
                    @endfor
                </select>

                <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'نهاية الأسبوع':'Week End'}}</label>
                <select dir="ltr" wire:model="w_d_e" class="dialog-box-input">
                    @for($i =0 ;$i <= count($daysOfTheWeek)-1 ;$i++)
                    <option selected value="{{$i}}">{{App::isLocale('ar')? $daysOfTheWeek_ar[$i]:$daysOfTheWeek[$i]}}</option>
                    @endfor
                </select>
            </div>
            <div class="dialog-ctas">
            <button wire:click="changeDays()" onclick="scroll_unlock()" class="dialog-btn dialog-confirm">{{App::isLocale('ar')? 'تأكيد':'Confirm'}}</button>
            <button wire:click="hideDialog()" onclick="scroll_unlock()" class="dialog-btn dialog-cancel">{{App::isLocale('ar')? 'إلغاء':'Cancle'}}</button>
            </div>
             </div>
        @break;
        @case(3)
        <div class="universal-popup__dialog-box">
            <div class="universal-popup__dialog-box--dialog-header">
            <span class="dialog-name">{{App::isLocale('ar')? 'تعديل معلومات العيادة':'Editing Clinic Information'}}</span>
            <button onclick="scroll_unlock()" wire:click = "hideDialog()" class="dialog-close"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div dir="{{App::isLocale('ar')? 'rtl':'ltr'}}" class="universal-popup__dialog-box--dialog-body">
                <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'بداية اليوم':'Work Hours Start'}}</label>
                <input wire:model="w_h_s" type="time" class="dialog-box-input">
                <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'نهاية اليوم':'Work Hours End'}}</label>
                <input wire:model="w_h_e" type="time" class="dialog-box-input">
            </div>
            <div class="dialog-ctas">
            <button wire:click="changeHours()" onclick="scroll_unlock()" class="dialog-btn dialog-confirm">{{App::isLocale('ar')? 'تأكيد':'Confirm'}}</button>
            <button wire:click="hideDialog()" onclick="scroll_unlock()" class="dialog-btn dialog-cancel">{{App::isLocale('ar')? 'إلغاء':'Cancle'}}</button>
            </div>
             </div>
        @break;
        @case(4)
        <div class="universal-popup__dialog-box">
            <div class="universal-popup__dialog-box--dialog-header">
            <span class="dialog-name">{{App::isLocale('ar')? 'تعديل معلومات العيادة':'Editing Clinic Information'}}</span>
            <button onclick="scroll_unlock()" wire:click = "hideDialog()" class="dialog-close"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div dir="{{App::isLocale('ar')? 'rtl':'ltr'}}" class="universal-popup__dialog-box--dialog-body">
                <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'البريد الإلكتروني الجديد':'New Email Address'}}</label>
                <input wire:model="email" type="text" class="dialog-box-input">
            </div>
            <div class="dialog-ctas">
            <button wire:click="changeEmail()" onclick="scroll_unlock()" class="dialog-btn dialog-confirm">{{App::isLocale('ar')? 'تأكيد':'Confirm'}}</button>
            <button wire:click="hideDialog()" onclick="scroll_unlock()" class="dialog-btn dialog-cancel">{{App::isLocale('ar')? 'إلغاء':'Cancle'}}</button>
            </div>
             </div>
        @break;
        @case(5)
        <div class="universal-popup__dialog-box">
            <div class="universal-popup__dialog-box--dialog-header">
            <span class="dialog-name">{{App::isLocale('ar')? 'تعديل معلومات العيادة':'Editing Clinic Information'}}</span>
            <button onclick="scroll_unlock()" wire:click = "hideDialog()" class="dialog-close"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div dir="{{App::isLocale('ar')? 'rtl':'ltr'}}" class="universal-popup__dialog-box--dialog-body">
                <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'رقم الهاتف الجديد':'New Email Address'}}</label>
                <input wire:model="phone" type="text" class="dialog-box-input">
            </div>
            <div class="dialog-ctas">
            <button wire:click="changePhone()" onclick="scroll_unlock()" class="dialog-btn dialog-confirm">{{App::isLocale('ar')? 'تأكيد':'Confirm'}}</button>
            <button wire:click="hideDialog()" onclick="scroll_unlock()" class="dialog-btn dialog-cancel">{{App::isLocale('ar')? 'إلغاء':'Cancle'}}</button>
            </div>
             </div>
        @break;
        @case(6)
        <div class="universal-popup__dialog-box">
            <div class="universal-popup__dialog-box--dialog-header">
            <span class="dialog-name">{{App::isLocale('ar')? 'تعديل معلومات العيادة':'Editing Clinic Information'}}</span>
            <button onclick="scroll_unlock()" wire:click = "hideDialog()" class="dialog-close"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div dir="{{App::isLocale('ar')? 'rtl':'ltr'}}" class="universal-popup__dialog-box--dialog-body">
                <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'الفئة':'Category'}}</label>
                <select dir="ltr" wire:model="categ" class="dialog-box-input">
                    @foreach($categs as $city)
                    <option value="{{$city->id}}">{{App::isLocale('ar')? $city->name_ar:$city->name_en}}</option>
                    @endforeach
                </select>
            </div>
            <div class="dialog-ctas">
            <button wire:click="changeCateg()" onclick="scroll_unlock()" class="dialog-btn dialog-confirm">{{App::isLocale('ar')? 'تأكيد':'Confirm'}}</button>
            <button wire:click="hideDialog()" onclick="scroll_unlock()" class="dialog-btn dialog-cancel">{{App::isLocale('ar')? 'إلغاء':'Cancle'}}</button>
            </div>
             </div>
        @break;
        @case(7)
        <div class="universal-popup__dialog-box">
            <div class="universal-popup__dialog-box--dialog-header">
            <span class="dialog-name">{{App::isLocale('ar')? 'تعديل معلومات العيادة':'Editing Clinic Information'}}</span>
            <button onclick="scroll_unlock()" wire:click = "hideDialog()" class="dialog-close"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div dir="{{App::isLocale('ar')? 'rtl':'ltr'}}" class="universal-popup__dialog-box--dialog-body">
                <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'المدينة':'City'}}</label>
                <select dir="ltr" wire:model="city" class="dialog-box-input">
                    @foreach($cities as $city)
                    <option value="{{$city->id}}">{{App::isLocale('ar')? $city->name_ar:$city->name_en}}</option>
                    @endforeach
                </select>
            </div>
            <div class="dialog-ctas">
            <button wire:click="changeCity()" onclick="scroll_unlock()" class="dialog-btn dialog-confirm">{{App::isLocale('ar')? 'تأكيد':'Confirm'}}</button>
            <button wire:click="hideDialog()" onclick="scroll_unlock()" class="dialog-btn dialog-cancel">{{App::isLocale('ar')? 'إلغاء':'Cancle'}}</button>
            </div>
             </div>
        @break;
        @case(8)
        <div class="universal-popup__dialog-box">
            <div class="universal-popup__dialog-box--dialog-header">
            <span class="dialog-name">{{App::isLocale('ar')? 'تعديل معلومات العيادة':'Editing Clinic Information'}}</span>
            <button onclick="scroll_unlock()" wire:click = "hideDialog()" class="dialog-close"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div dir="{{App::isLocale('ar')? 'rtl':'ltr'}}" class="universal-popup__dialog-box--dialog-body">
                <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'اسم الخدمة بالعربية':'Service Name In Arabic'}}</label>
                <input wire:model="s_ar" type="text" class="dialog-box-input">
                <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'اسم الخدمة بالإنجليزية':'Service Name In English'}}</label>
                <input wire:model="s_en" type="text" class="dialog-box-input">
                <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'السعر':'Price'}}</label>
                <input wire:model="price" type="text" class="dialog-box-input">
                <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'الخصم':'Discount'}}</label>
                <input wire:model="discount" type="text" class="dialog-box-input">
              
            </div>
            <div class="dialog-ctas">
            <button wire:click="createService()" onclick="scroll_unlock()" class="dialog-btn dialog-confirm">{{App::isLocale('ar')? 'تأكيد':'Confirm'}}</button>
            <button wire:click="hideDialog()" onclick="scroll_unlock()" class="dialog-btn dialog-cancel">{{App::isLocale('ar')? 'إلغاء':'Cancle'}}</button>
            </div>
             </div>
        @break;
        @case(9)
        <div class="universal-popup__dialog-box">
            <div class="universal-popup__dialog-box--dialog-header">
            <span class="dialog-name">{{App::isLocale('ar')? 'تعديل معلومات العيادة':'Editing Clinic Information'}}</span>
            <button onclick="scroll_unlock()" wire:click = "hideDialog()" class="dialog-close"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div dir="{{App::isLocale('ar')? 'rtl':'ltr'}}" class="universal-popup__dialog-box--dialog-body">
                <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'اسم الخدمة بالعربية':'Service Name In Arabic'}}</label>
                <input wire:model="s_ar" type="text" class="dialog-box-input">
                <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'اسم الخدمة بالإنجليزية':'Service Name In English'}}</label>
                <input wire:model="s_en" type="text" class="dialog-box-input">
                <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'السعر':'Price'}}</label>
                <input wire:model="price" type="text" class="dialog-box-input">
                <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'الخصم':'Discount'}}</label>
                <input wire:model="discount" type="text" class="dialog-box-input">
              
            </div>
            <div class="dialog-ctas">
            <button wire:click="editService()" onclick="scroll_unlock()" class="dialog-btn dialog-confirm">{{App::isLocale('ar')? 'تأكيد':'Confirm'}}</button>
            <button wire:click="hideDialog()" onclick="scroll_unlock()" class="dialog-btn dialog-cancel">{{App::isLocale('ar')? 'إلغاء':'Cancle'}}</button>
            </div>
             </div>
        @break;
        @case(10)
        <div class="universal-popup__dialog-box">
            <div class="universal-popup__dialog-box--dialog-header">
            <span class="dialog-name">{{App::isLocale('ar')? 'تعديل معلومات العيادة':'Editing Clinic Information'}}</span>
            <button onclick="scroll_unlock()" wire:click = "hideDialog()" class="dialog-close"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div dir="{{App::isLocale('ar')? 'rtl':'ltr'}}" class="universal-popup__dialog-box--dialog-body">
                <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'الإسم الأول':'First Name'}}</label>
                <input wire:model="d_fname" type="text" class="dialog-box-input">
                <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'الإسم الأخير':'Last Name'}}</label>
                <input wire:model="d_lname" type="text" class="dialog-box-input">
                <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'رقم الهاتف':'Phone Number'}}</label>
                <input wire:model="d_phone" type="text" class="dialog-box-input">
          
              
            </div>
            <div class="dialog-ctas">
            <button wire:click="saveDoctor()" onclick="scroll_unlock()" class="dialog-btn dialog-confirm">{{App::isLocale('ar')? 'تأكيد':'Confirm'}}</button>
            <button wire:click="hideDialog()" onclick="scroll_unlock()" class="dialog-btn dialog-cancel">{{App::isLocale('ar')? 'إلغاء':'Cancle'}}</button>
            </div>
             </div>
        @break;
        @case(11)
        <div class="universal-popup__dialog-box">
            <div class="universal-popup__dialog-box--dialog-header">
            <span class="dialog-name">{{App::isLocale('ar')? 'تعديل معلومات العيادة':'Editing Clinic Information'}}</span>
            <button onclick="scroll_unlock()" wire:click = "hideDialog()" class="dialog-close"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div dir="{{App::isLocale('ar')? 'rtl':'ltr'}}" class="universal-popup__dialog-box--dialog-body">
                <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'الإسم الأول':'First Name'}}</label>
                <input wire:model="d_fname" type="text" class="dialog-box-input">
                <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'الإسم الأخير':'Last Name'}}</label>
                <input wire:model="d_lname" type="text" class="dialog-box-input">
                <label for="" class="dialog-box-label">{{App::isLocale('ar')? 'رقم الهاتف':'Phone Number'}}</label>
                <input wire:model="d_phone" type="text" class="dialog-box-input">
          
              
            </div>
            <div class="dialog-ctas">
            <button wire:click="editDoctor()" onclick="scroll_unlock()" class="dialog-btn dialog-confirm">{{App::isLocale('ar')? 'تأكيد':'Confirm'}}</button>
            <button wire:click="hideDialog()" onclick="scroll_unlock()" class="dialog-btn dialog-cancel">{{App::isLocale('ar')? 'إلغاء':'Cancle'}}</button>
            </div>
             </div>
        @break;
        @endswitch
        
         </div>
    @endif
            <!-- end -->
</div>
