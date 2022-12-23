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
   <h1 class="clinic-container__header">{{App::isLocale('ar')? 'عيادات منتهية الصلاحية':'Expired Clinics'}} ({{count($expiredClinics)}})</h1>
   <h1 class="clinic-container__header">{{App::isLocale('ar')? 'عيادات غير فعالة':'In-Active Clinics'}}</h1>
   <h1 class="clinic-container__header">{{App::isLocale('ar')? 'عيادات فعالة':'Active Clinics'}}</h1>
   
  

</div>
</main>
</div>
