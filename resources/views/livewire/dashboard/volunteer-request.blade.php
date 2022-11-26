<div>
    @if($hasApplied == 0)
 <form method="POST" action="saveVolunteerRequest" enctype="multipart/form-data" class="volunteer-form" dir="{{App::isLocale('ar')? 'rtl':'ltr'}}">
    @csrf
    <span class="volunteer-form__volunteer-header">{{App::isLocale('ar')? 'طلب تطوع':'Volunteer Request'}}</span>
    <span class="volunteer-form__volunteer-text">{{App::isLocale('ar') ? 'كن متطوعآ لدينا الآن من خلال تعبئة النموذج أدناه ':'Become A Volunteer Now By Filling The Form Below. '}}</span>
     <div class="volunteer-form__input">
        <label for="" class="volunteer-form__input--label">{{App::isLocale('ar')? 'المحافظة التي تعيش فيها':'Your District'}}</label>
        <span class="volunteer-form__input--legend">{{App::isLocale('ar')? 'ستظهر لديك طلبات التطوع بناء على المحافظة التي تعيش فيها، يمكنك تغيير مكان سكنك في أية وقت!':'All Volunteering Requests will apper to you based on your district and you can change this value anytime you want!'}}</span>
        <select required name="city" class="volunteer-form__input--field">
            <option value="" selected>--{{App::isLocale('ar')? 'اختر المحافظة':'Choose District'}}--</option>
            @foreach($districts as $city)
            <option value="{{$city->id}}">{{App::isLocale('ar')? $city->name_ar:$city->name_en}}</option>
            @endforeach
        </select>
     </div>
     <div class="volunteer-form__input">
        <label for="" class="volunteer-form__input--label">{{App::isLocale('ar')?'سيرتك الذاتية (اختيارية)':'Your Resume (Optional)'}}</label>
        <span class="volunteer-form__input--legend">{{App::isLocale('ar')? 'يمكنك ارفاق سيرتك الذاتية اذا كانت لديك خبرات طبية سابقة ، سيتم التواصل معك من خلال فريقنا في حال تم النظر والموافقة على طلبك !':'You Can Attatch Your Resume In Case You Have Previous Medical Experience. After Looking In Your Application We will Contact you Once Approved'}}</span>
        <label for="cv"  id="pdfLabel" class="data-add">{{App::isLocale('ar')? 'تحميل سيرة ذاتية ':'Upload A Resume'}}</label>
<input id="cv" onchange="showFileName(event)" name="certificate" class="data-input-h" type="file" accept=".pdf" >

     </div>
     <div class="volunteer-form__input">

    <label class="confirmation-policy" for="" ><input required type="checkbox" name="approvedPolicies" id="">{{App::isLocale('ar')? 'اكمالك لاجراءات الطلب يعني موافقتك على':'By Clicking Save You Approve To Our '}} <a class="usage-link" href="#">{{App::isLocale('ar')? 'سياسات الاستخدام والخصوصية':'Privacy And Usage Terms'}}</a></label>
     </div>
     <button type="submit" class="volunteer-form__submit">{{App::isLocale('ar')? 'حفظ الطلب':'Save Request'}}</button>

</form>
@else
<div class="volunteer-has-applied">

<span class="volunteer-has-applied__head">{{App::isLocale('ar')? 'تم استلام الطلب بنجاح! سيتم اعلامك بنتيجة الطلب قريبآ':'We have successfully recieved your request! You will be notified with the result soon.'}}</span>
<span class="volunteer-has-applied__body">
    {{App::isLocale('ar')? 'يمكنك العودة الى الموقع الآن واستكمال التصفح!':'You Can Now Return To The Site And Continue Browsing!'}}
</span>

<a href="{{url('/')}}" class="volunteer-has-applied__cta">{{App::isLocale('ar')? 'الصفحة الرئيسية':'Home Page'}}</a>
</div>


@endif
</div>
