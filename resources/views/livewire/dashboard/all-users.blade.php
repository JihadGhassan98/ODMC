<div>
<main class="all-volunteers" dir="{{App::isLocale('ar')? 'rtl':'ltr'}}">
<span class="db-body__saperator">{{App::isLocale('ar')? 'المستخدمون':'Volunteers'}}</span>
<span class="all-volunteers__requests--title">{{App::isLocale('ar')? 'المستخدمون':'Users'}} ({{ $userCount}})</span>
<div class="all-volunteers__requests">
<div class="all-volunteers__requests--search">
      <input placeholder="{{App::isLocale('ar')? 'البحث عن مستخدم...':'Search FOr A User...'}}" type="text" class="search-bar" wire:model="searchKey">
 
   </div>
   </div>
</main>
</div>
