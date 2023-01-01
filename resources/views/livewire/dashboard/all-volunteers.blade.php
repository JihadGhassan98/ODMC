<div>
<main class="all-volunteers" dir="{{App::isLocale('ar')? 'rtl':'ltr'}}">
<span class="db-body__saperator">{{App::isLocale('ar')? 'المتطوعون':'Volunteers'}}</span>
<section class="all-volunteers__requests">
   <span class="all-volunteers__requests--title">{{App::isLocale('ar')? 'طلبات التطوع':'Volunteer Requests'}} ({{ count($volunteerRequests)}})</span>
@forelse($volunteerRequests as $VReq)
   <div class="all-volunteers__requests--request">
    <img src="{{url('/userImages/'.$VReq->profile_photo_path)}}" alt="" class="request_img">
    <span class="request_data"><b>{{App::isLocale('ar')? 'الإسم':'Name'}}: </b> {{$VReq->name}}</span>
    @if(App::isLocale('ar'))
    <span class="request_data"><b>{{App::isLocale('ar')? 'الجنس':'Gender'}}: </b> {{($VReq->gender == 'male') ? 'ذكر':'أنثى'}}</span>
    @else
    <span class="request_data"><b>{{App::isLocale('ar')? 'الجنس':'Gender'}}: </b>  {{($VReq->gender == 'male') ? 'male':'female'}}</span>

    @endif
    <span class="request_data"><b>{{App::isLocale('ar')? 'تاريخ الميلاد':'Birthdate'}}: </b>  {{$VReq->birthdate}}</span>
    <span class="request_data"><b>{{App::isLocale('ar')? 'الهاتف':'Phone'}}: </b> {{$VReq->phone}}</span>
    <span class="request_data"><b>{{App::isLocale('ar')? 'البريد الإلكتروني':'Email'}}: </b> {{$VReq->email}}</span>
    <span class="request_data"><b>{{App::isLocale('ar')? 'المدينة':'City'}}: </b> {{App::isLocale('ar')? $VReq->city_ar:$VReq->city_en}}</span>
    @if($VReq->certificate_path)
    <span class="request_data cv-link"><a href="{{url('/medicalReports/'.$VReq->certificate_path)}}" download class="request_file">{{App::isLocale('ar')? 'تحميل السيرة الذاتية':'Download Resume'}}</a></span>
    @else
    <span class="request_data"><button class="request_no-file" Disabled>{{App::isLocale('ar')? 'لم يتم تحميل سيرة ذاتية':'No Resume Was uploaded'}}</button></span>
    @endif
    <div class="request-ctas">
    <button wire:click="acceptVolunteer({{$VReq->userID}})" class="request_cta-accept">{{App::isLocale('ar')? 'قبول':'Accept'}}</button>
    <button Wire:click="rejectVolunteer({{$VReq->volID}})" class="request_cta-reject">{{App::isLocale('ar')? 'رفض':'Reject'}}</button>
   </div>
   </div>
   @empty
   <span class="request_none">{{App::isLocale('ar')? 'لا يوجد طلبات جديدة':'There Are No New Requests'}}</span>
   @endforelse
</section>


<!-- All Volunteers - accepted -->
<section class="all-volunteers__requests">
   <span class="all-volunteers__requests--title">{{App::isLocale('ar')? 'المتطوعون':'Volunteers'}} ({{ count($volunteers)}})</span>

   <div class="all-volunteers__requests--search">
      <input placeholder="{{App::isLocale('ar')? 'البحث عن متطوع...':'Search FOr A Volunteer...'}}" type="text" class="search-bar" wire:model="searchKey">
 
   </div>

@forelse($volunteers as $VReq)
   <div class="all-volunteers__requests--request">
    <img src="{{url('/userImages/'.$VReq->profile_photo_path)}}" alt="" class="request_img">
    <span class="request_data"><b>{{App::isLocale('ar')? 'الإسم':'Name'}}: </b> {{$VReq->name}}</span>
    @if(App::isLocale('ar'))
    <span class="request_data"><b>{{App::isLocale('ar')? 'الجنس':'Gender'}}: </b> {{($VReq->gender == 'male') ? 'ذكر':'أنثى'}}</span>
    @else
    <span class="request_data"><b>{{App::isLocale('ar')? 'الجنس':'Gender'}}: </b>  {{($VReq->gender == 'male') ? 'male':'female'}}</span>

    @endif
    <span class="request_data"><b>{{App::isLocale('ar')? 'تاريخ الميلاد':'Birthdate'}}: </b>  {{$VReq->birthdate}}</span>
    <span class="request_data"><b>{{App::isLocale('ar')? 'الهاتف':'Phone'}}: </b> {{$VReq->phone}}</span>
    <span class="request_data"><b>{{App::isLocale('ar')? 'البريد الإلكتروني':'Email'}}: </b> {{$VReq->email}}</span>
    <span class="request_data"><b>{{App::isLocale('ar')? 'المدينة':'City'}}: </b> {{App::isLocale('ar')? $VReq->city_ar:$VReq->city_en}}</span>
    <span class="request_data"><b>{{App::isLocale('ar')? 'النقاط':'Points'}}: </b> {{number_format($VReq->points,2)}} <button wire:click="resetPoints({{$VReq->volID}})" class="clear-points"><i class="fa fa-refresh" aria-hidden="true"></i></button></span>
    @if($VReq->certificate_path)
    <span class="request_data cv-link"><a href="{{url('/medicalReports/'.$VReq->certificate_path)}}" download class="request_file">{{App::isLocale('ar')? 'تحميل السيرة الذاتية':'Download Resume'}}</a></span>
    @else
    <span class="request_data"><button class="request_no-file" Disabled>{{App::isLocale('ar')? 'لم يتم تحميل سيرة ذاتية':'No Resume Was uploaded'}}</button></span>
    @endif
    <div class="request-ctas">
 
    <button Wire:click="deleteVolunteer({{$VReq->userID}},{{$VReq->volID}})" class="request_cta-reject">{{App::isLocale('ar')? 'حذف':'Delete'}}</button>
   </div>
   </div>
   <div class="">{{$volunteers->links()}}</div>
   @empty
   <span class="request_none">{{App::isLocale('ar')? 'لا يوجد متطوعون حاليآ ':'There Are No Volunteers Right Now'}}</span>
   @endforelse
</section>

</main>
</div>
