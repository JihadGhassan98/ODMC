<div>
@if($this->applied())

<div class="volunteer-has-applied">

<span class="volunteer-has-applied__head">{{App::isLocale('ar')? 'تم استلام الطلب بنجاح! سيتم اعلامك بنتيجة الطلب قريبآ':'We have successfully recieved your request! You will be notified with the result soon.'}}</span>
<span class="volunteer-has-applied__body">
    {{App::isLocale('ar')? 'يمكنك العودة الى الموقع الآن واستكمال التصفح!':'You Can Now Return To The Site And Continue Browsing!'}}
</span>

<a href="{{url('/')}}" class="volunteer-has-applied__cta">{{App::isLocale('ar')? 'الصفحة الرئيسية':'Home Page'}}</a>
</div>



@else
<form method="POST" action="/createClinic" enctype="multipart/form-data" class="clinic-form" dir="{{App::isLocale('ar')? 'rtl':'ltr'}}">
    @csrf
  
    <span class="clinic-form__clinic-header">{{App::isLocale('ar')? 'طلب تسجيل عيادة':'Clinic Registration Request'}}</span>
    <span class="clinic-form__clinic-text">{{App::isLocale('ar') ?  'لديك عيادة وتود الانضمام الينا؟ قم بتعبئة النموذج أدناه':'Do You Have A Clinic And You Want To Join Us? Fill The Form Below'}}</span>
    @if ($errors->any())
    <div class="clinic-form__alert">
        <ul class="clinic-form__alert--error">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif 
    <div class="clinic-form__field">
     <label for="" class="clinic-form__field--label">{{App::isLocale('ar')? 'الشعار':'Logo'}}</label>

     <label for="userImage" class="upload-form__input-label" >
     <img src="/systemImages/defaultUser.jpg" alt="" class="upload-form__input-label--image" id="userImage_preview">
   </label>
   <input  onchange="showPreview(event)" id="userImage" name="clinic_logo" type="file" class="upload-form__input-field"  accept="image/*,.jpg,.png">    
    </div>
     <div class="clinic-form__field">
        <label for="" class="clinic-form__field--label">{{App::isLocale('ar')? 'المدينة':'City'}}</label>
        <select required name="city" id="" class="clinic-form__field--input">
            <option value=""> {{App::isLocale('ar')? '--اختر--':'--Choose--'}}</option>
            @foreach($cities as $city)
            <option value="{{$city->id}}">{{App::isLocale('ar')? $city->name_ar:$city->name_en}}</option>
            @endforeach
        </select>
     </div>
     <div class="clinic-form__field">
        <label for="" class="clinic-form__field--label">{{App::isLocale('ar')? 'الفئة':'Category'}}</label>
        <select required name="category" id="" class="clinic-form__field--input">
            <option value=""> {{App::isLocale('ar')? '--اختر--':'--Choose--'}}</option>
            @foreach($categories as $categ)
            <option value="{{$categ->id}}">{{App::isLocale('ar')? $categ->name_ar:$categ->name_en}}</option>
            @endforeach
        </select>
     </div>

     <div class="clinic-form__field">
        <label for="" class="clinic-form__field--label">{{App::isLocale('ar')? 'الإسم بالعربية':'Name In Arabic'}}</label>
         <input required type="text" name="name_ar" placeholder="{{App::isLocale('ar')? 'الإسم بالعربية':'Name In Arabic'}}" class="clinic-form__field--input">
    </div>
     <div class="clinic-form__field">
        <label for="" class="clinic-form__field--label">{{App::isLocale('ar')? 'الإسم بالانجليزية':'Name In English'}}</label>
         <input required type="text" name="name_en" placeholder="{{App::isLocale('ar')? 'الإسم بالانجليزية':'Name In English'}}" class="clinic-form__field--input">
    </div>

     <div class="clinic-form__field">
        <label for="" class="clinic-form__field--label">{{App::isLocale('ar')? 'العنوان':'Address'}}</label>
         <input required type="text" name="address" placeholder="{{App::isLocale('ar')? 'العنوان':'Address'}}" class="clinic-form__field--input">
    </div>

     <div class="clinic-form__field">
        <label for="" class="clinic-form__field--label">{{App::isLocale('ar')? 'البريد الالكتروني':'Email Address'}}</label>
         <input required type="text" name="email" placeholder="{{App::isLocale('ar')? 'البريد الإلكتروني':'Email Address'}}" class="clinic-form__field--input">
    </div>

     <div class="clinic-form__field">
        <label for="" class="clinic-form__field--label">{{App::isLocale('ar')? 'رقم الهاتف':'Phone Number'}}</label>
         <input required type="text" name="phone" placeholder="{{App::isLocale('ar')? 'رقم الهاتف':'Phone Number'}}" class="clinic-form__field--input">
    </div>

    <button type="submit" class="clinic-form__submit">{{App::isLocale('ar')? 'تقديم الطلب':'Submit Application'}}</button>
</form>
 @endif

</div>
