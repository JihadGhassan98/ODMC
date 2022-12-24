<div>
<main class="all-volunteers" dir="{{App::isLocale('ar')? 'rtl':'ltr'}}">
<span class="db-body__saperator">{{App::isLocale('ar')? 'العيادات':'Clinics'}}</span>

<div class="all-volunteers__requests">
<div class="all-volunteers__requests--search">
      <input placeholder="{{App::isLocale('ar')? 'البحث عن عيادة...':'Search For A Clinic...'}}" type="text" class="search-bar" wire:model="searchKey">
 
   </div>
</div>
<div class="clinic-container">

   <h1 class="clinic-container__header">{{App::isLocale('ar')? 'عيادات قيد الانتظار':'Pending Clinics'}} ({{count($pendingClinics)}})</h1>
   <div class="clinic-container__clinics">
      @forelse($pendingClinics as $clinic)
      <div class="clinic-container__clinics--clinic">
         <img src="/userImages/{{$clinic->image}}" alt="" class="clinic-image">
         <span class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')? 'الإسم:':'Name:'}}</span>{{App::isLocale('ar')? $clinic->name_ar:$clinic->name_en}}</span>
         <div class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')? 'تاريخ الطلب:':'Request Date:'}}</span>{{$clinic->created_at}}</div>
         <div class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')?'المدينة:':'City:'}}</span>{{App::isLocale('ar')?$clinic->city_ar:$clinic->city_en}}</div>
         <div class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')?'الإختصاص:':'Speciality:'}}</span>{{App::isLocale('ar')?$clinic->categ_ar:$clinic->categ_en}}</div>
         <div class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')?'المالك:':'Owner:'}}</span>{{$clinic->name}}</div>
         <div class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')?'العنوان:':'Address:'}}</span>{{$clinic->address}}</div>
         <div class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')?'البريد الالكتروني:':'Email Address:'}}</span>{{$clinic->email}}</div>
         <div class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')?'رقم الهاتف:':'Phone Number:'}}</span>{{$clinic->phone}}</div>
         <div class="clinic-ops">
            <button class="clinic-op accept" wire:click="acceptClinic({{$clinic->id}})">{{App::isLocale('ar')? 'قبول':'Accept'}}</button>
            <button class="clinic-op reject" wire:click="rejectClinic({{$clinic->id}})">{{App::isLocale('ar')? 'رفض':'Reject'}}</button>
            
         </div>


      </div>
      @empty
      <span class="clinic-not-found">{{App::isLocale('ar')? 'لا يوجد نتائج':'No Results Found'}}</span>
      @endforelse
      <div class="clinic-paginator">{{$pendingClinics->links()}}</div>
   </div>
   <h1 class="clinic-container__header">{{App::isLocale('ar')? 'عيادات منتهية الصلاحية':'Expired Clinics'}} ({{count($expiredClinics)}})</h1>
   <div class="clinic-container__clinics">
      @forelse($expiredClinics as $clinic)
      <div class="clinic-container__clinics--clinic">
         <img src="/userImages/{{$clinic->image}}" alt="" class="clinic-image">
         <span class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')? 'الإسم:':'Name:'}}</span>{{App::isLocale('ar')? $clinic->name_ar:$clinic->name_en}}</span>
         <div class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')? 'تاريخ الطلب:':'Request Date:'}}</span>{{$clinic->created_at}}</div>
         <div class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')?'المدينة:':'City:'}}</span>{{App::isLocale('ar')?$clinic->city_ar:$clinic->city_en}}</div>
         <div class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')?'المالك:':'Owner:'}}</span>{{$clinic->name}}</div>
         <div class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')?'العنوان:':'Address:'}}</span>{{$clinic->address}}</div>
         <div class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')?'البريد الالكتروني:':'Email Address:'}}</span>{{$clinic->email}}</div>
         <div class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')?'رقم الهاتف:':'Phone Number:'}}</span>{{$clinic->phone}}</div>
         <div class="clinic-ops">
            <button class="clinic-op refresh" wire:click="refreshClinic({{$clinic->id}})">{{App::isLocale('ar')? 'تجديد الإشتراك':'Re-new Subscription'}}</button>
         </div>


      </div>
      @empty
      <span class="clinic-not-found">{{App::isLocale('ar')? 'لا يوجد نتائج':'No Results Found'}}</span>
      @endforelse
      <div class="clinic-paginator">{{$expiredClinics->links()}}</div>
   </div>
   <h1 class="clinic-container__header">{{App::isLocale('ar')? 'عيادات غير فعالة':'In-Active Clinics'}} ({{count($inActiveClinics)}})</h1>
   <div class="clinic-container__clinics">
      @forelse($inActiveClinics as $clinic)
      <div class="clinic-container__clinics--clinic">
         <img src="/userImages/{{$clinic->image}}" alt="" class="clinic-image">
         <span class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')? 'الإسم:':'Name:'}}</span>{{App::isLocale('ar')? $clinic->name_ar:$clinic->name_en}}</span>
         <div class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')? 'تاريخ الطلب:':'Request Date:'}}</span>{{$clinic->created_at}}</div>
         <div class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')?'المدينة:':'City:'}}</span>{{App::isLocale('ar')?$clinic->city_ar:$clinic->city_en}}</div>
         <div class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')?'المالك:':'Owner:'}}</span>{{$clinic->name}}</div>
         <div class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')?'العنوان:':'Address:'}}</span>{{$clinic->address}}</div>
         <div class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')?'البريد الالكتروني:':'Email Address:'}}</span>{{$clinic->email}}</div>
         <div class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')?'رقم الهاتف:':'Phone Number:'}}</span>{{$clinic->phone}}</div>
         <div class="clinic-ops">
            <button class="clinic-op refresh accept" wire:click="activateClinic({{$clinic->id}})">{{App::isLocale('ar')? 'تفعيل':'Activate'}}</button>
          
            
         </div>


      </div>
      @empty
      <span class="clinic-not-found">{{App::isLocale('ar')? 'لا يوجد نتائج':'No Results Found'}}</span>
      @endforelse
      <div class="clinic-paginator">{{$inActiveClinics->links()}}</div>
   </div>
   
   <h1 class="clinic-container__header">{{App::isLocale('ar')? 'عيادات فعالة':'Active Clinics'}} ({{count($activeClinics)}})</h1>
   <div class="clinic-container__clinics">
      @forelse($activeClinics as $clinic)
      <div class="clinic-container__clinics--clinic">
         <img src="/userImages/{{$clinic->image}}" alt="" class="clinic-image">
         <span class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')? 'الإسم:':'Name:'}}</span>{{App::isLocale('ar')? $clinic->name_ar:$clinic->name_en}}</span>
         <div class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')? 'تاريخ التسجيل:':'Registration Date:'}}</span>{{$clinic->registration_date}}</div>
         <div class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')? 'تاريخ الإنتهاء:':'Expiration Date:'}}</span>{{$clinic->expiration_date}}</div>
         <div class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')?'المدينة:':'City:'}}</span>{{App::isLocale('ar')?$clinic->city_ar:$clinic->city_en}}</div>
         <div class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')?'المالك:':'Owner:'}}</span>{{$clinic->name}}</div>
         <div class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')?'العنوان:':'Address:'}}</span>{{$clinic->address}}</div>
         <div class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')?'البريد الالكتروني:':'Email Address:'}}</span>{{$clinic->email}}</div>
         <div class="clinic-data"><span class="clinic-data-holder">{{App::isLocale('ar')?'رقم الهاتف:':'Phone Number:'}}</span>{{$clinic->phone}}</div>
         <div class="clinic-ops">
            <button class="clinic-op refresh reject" wire:click="acceptClinic({{$clinic->id}})">{{App::isLocale('ar')? 'إلغاء التفعيل':'Deactivate'}}</button>
          
            
         </div>


      </div>
      @empty
      <span class="clinic-not-found">{{App::isLocale('ar')? 'لا يوجد نتائج':'No Results Found'}}</span>
      @endforelse
      <div class="clinic-paginator">{{$activeClinics->links()}}</div>
   </div>
   
  

</div>
</main>
</div>
