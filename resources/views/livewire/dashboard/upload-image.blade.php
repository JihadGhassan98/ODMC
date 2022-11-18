<div>
<form method="POST" action="{{url('uploadPhoto/'.Auth::user()->id)}}" enctype="multipart/form-data" class="upload-form">
    @csrf
    <span class="upload-form__title">{{App::isLocale('ar')? 'قم بتحميل صورة ملفك الشخصي للمتابعة':'Upload Your Profile Picture To Continue'}}</span>
   <label for="userImage" class="upload-form__input-label" >
     <img src="/systemImages/defaultUser.jpg" alt="" class="upload-form__input-label--image" id="userImage_preview">
   </label>
   <input onchange="showPreview(event)" id="userImage" name="profile_pic" type="file" class="upload-form__input-field"  accept="image/*,.jpg,.png">
   <button type="submit" class="upload-form__submit-cta">{{App::isLocale('ar')? 'حفظ ومتابعة':'Save And Continue'}}</button>
   <span class="seperator-text">{{App::isLocale('ar')? 'أو':'OR'}}</span>
   <a href="{{url('/dashboard')}}" class="upload-form__cancel-cta">{{App::isLocale('ar')? 'إضافة الصورة لاحقآ':'Skip For Now'}}</a>
</form>
</div>
