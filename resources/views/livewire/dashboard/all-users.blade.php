<div>
<main class="all-volunteers" dir="{{App::isLocale('ar')? 'rtl':'ltr'}}">
<span class="db-body__saperator">{{App::isLocale('ar')? 'المستخدمون':'Volunteers'}}</span>
<span class="all-volunteers__requests--title">{{App::isLocale('ar')? 'المستخدمون':'Users'}} ({{ $userCount - 1}})</span>
<div class="all-volunteers__requests">
<div class="all-volunteers__requests--search">
      <input placeholder="{{App::isLocale('ar')? 'البحث عن مستخدم...':'Search FOr A User...'}}" type="text" class="search-bar" wire:model="searchKey">
 
   </div>
   <div class="all-volunteers__requests--user-list">

   @foreach($users as $user)
   @if($user->id != Auth::user()->id)
<div class="user-item">
   <img src="/userImages/{{$user->profile_photo_path}}" alt="" class="user-image">
   <span class="user-data">{{$user->name}}</span>
   @switch($user->type)
   @case(1)
   <span class="user-data">{{App::isLocale('ar')? 'مستخدم':'User'}}</span>
   @break
   @case(2)
   <span class="user-data">{{App::isLocale('ar')? 'متطوع':'Volunteer'}}</span>
   @break
   @case(3)
   <span class="user-data">{{App::isLocale('ar')? 'صاحب عيادة \ عيادات':'User'}}</span>
   @break
   @case(4)
   <span class="user-data">{{App::isLocale('ar')? 'مدير رئيسي':'Administrator'}}</span>
   @break
   @endswitch
   <span class="user-data">{{$user->email}}</span>
   <span class="user-data">{{$user->phone}}</span>
   <span class="user-data">
      @if($user->gender == 'male')
{{App::isLocale('ar')? 'ذكر':'Male'}}

      @else
      {{App::isLocale('ar')? 'أنثى':'Female'}}

      @endif

   </span>
   <span class="user-data">{{$user->birthdate}}</span>
   <span class="user-data">{{$user->created_at}}</span>
   @if($user->active == 0)
   <button wire:click="activateUser({{$user->id}})" class="user-cta user-active "><i class="fa-solid fa-power-off"></i> 
   <div class="user-tooltip">
   {{App::isLocale('ar')? 'التفعيل':'Activate'}}
   </div>
   </button>
   @else
   <button wire:click="deactivateUser({{$user->id}})" class="user-cta user-inactive "><i class="fa-solid fa-power-off"></i> 
   <div class="user-tooltip">
   {{App::isLocale('ar')? 'ايقاف التفعيل':'Deactivate'}}
   </div>
   </button>
   @endif
   <button wire:click ="userType({{$user->id}})" class="user-cta {{$user->type == 4? 'user-inactive':'user-active'}} "><i class="fa-solid fa-user-shield"></i> <div class="user-tooltip">
      @if($user->type != 4)
      {{App::isLocale('ar')? 'ترقية الى مدير رئيسي':'Promote To Admin'}}
       @else
       {{App::isLocale('ar')? 'إزالة من الإدارة':'Remove From Admins'}}
      @endif
   </div>
</button>

<button wire:click="requestAction({{$user->id}})" onclick="scroll_lock()" class="user-cta user-inactive"><i class="fa fa-trash" aria-hidden="true"></i>
<div class="user-tooltip">{{App::isLocale('ar')? 'حذف':'Delete'}}</div></button>

</div>
@endif

   @endforeach
   </div>
   <div class="">{{$users->links()}}</div>
   </div>
</main>



@if($this->deletePrompt == 1)

<div class="universal-popup">


<div class="universal-popup__dialog-box">
<div class="universal-popup__dialog-box--dialog-header">
<span class="dialog-name">{{App::isLocale('ar')? 'تأكيد حذف المستخدم':'User Deletion Confirmation'}}</span>
<button onclick="scroll_unlock()" wire:click = "closeAction()" class="dialog-close"><i class="fa-solid fa-xmark"></i></button>
</div>
<div dir="{{App::isLocale('ar')? 'rtl':'ltr'}}" class="universal-popup__dialog-box--dialog-body">

      @if(App::isLocale('ar'))
      <p class="dialog-text">
      هل أنت متأكد من عملية حذف المستخدم؟
اذا قمت بحذف بياناته ، فهذه العملية نهائية ولا يمكن الرجوع عنها
سيتم حذف ما يلي:
<br>
<ul class="dialog-list">
   <li> الحساب كاملا </li>
   <li>عيادات المستخدم و معلومات المواعيد </li>
   <li> سجلات التطوع و النقاط </li>
</ul>
للمتابعة اضغط زر التأكيد أدناه.
      </p>
@else
<p class="dialog-text">
Are you sure about the user deletion process?
If you delete his data, this process is final and irreversible
The following will be deleted:
<br>
<ul class="dialog-list">
   <li>The full account</li>
   <li>User clinics and appointment information</li>
   <li>Volunteer records and points</li>
</ul>
To continue, click the confirmation button below.
</p>
      @endif

</div>
<div class="dialog-ctas">
   <button wire:click="deleteUser()" class="dialog-btn dialog-confirm">{{App::isLocale('ar')? 'تأكيد':'Confirm'}}</button>
   <button wire:click="closeAction()" onclick="scroll_unlock()" class="dialog-btn dialog-cancel">{{App::isLocale('ar')? 'إلغاء':'Cancle'}}</button>
   </div>
</div>

</div>


@endif
</div>
