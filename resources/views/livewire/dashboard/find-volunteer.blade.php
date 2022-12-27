<div>
    <main class="db-body" dir="{{App::isLocale('ar')?  'rtl':'ltr'}}">
        <span class="db-body__saperator">{{App::isLocale('ar')? 'طلبات التطوع':'Volunteer Requests'}}</span>

      <div class="find-volunteer">
       <span class="find-volunteer__head">{{App::isLocale('ar') ? 'إذا كنت ترغب بالحصول على المساعدة من قبل احد المتطوعين، يرجى الضغط على الزر أدناه':'If You Need Help From Our Volunteers Please Press The button Below'}}</span>
       <span class="find-volunteer__status">{{App::isLocale('ar')? 'الحالة:':'Status: '}}</span>
       @if(App::isLocale('ar'))
       <button wire:click="switchVol()" class="find-volunteer__cta {{(Auth::user()->need_volunteer)? 'no-vol':'yes-vol'}}">{{Auth::user()->need_volunteer? 'لا أحتاج إلى متطوع':'أحتاج الى متطوع'}}</button>
       @else 
       <button wire:click="switchVol()" class="find-volunteer__cta {{Auth::user()->need_volunteer ? 'yes-vol':'no-vol'}}">{{Auth::user()->need_volunteer? 'I Don\'t Need A Volunteer. ':'I Need A Volunteer.'}}</button>
    @endif 
    </div>



    </main>
</div>
