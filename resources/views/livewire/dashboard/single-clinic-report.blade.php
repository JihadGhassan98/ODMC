<div>
    <main class="db-body" dir="{{App::isLocale('ar')? 'rtl':'ltr'}}">

        <span class="db-body__saperator">{{App::isLocale('ar')? $currClinic->name_ar:$currClinic->name_en}}</span>
        
        <div class="my-appointments">
            <div class="my-appointments__status-ctas">
                <span class="my-appointments__status-ctas--cta-text">{{App::isLocale('ar')? 'فرز حسب الحالة:':'Sort By Status'}}</span>
                <button wire:click="sort_apts(1)" class="my-appointments__status-ctas--status-cta">{{App::isLocale('ar')? 'منتهي':'Finished'}}</button>
                <button wire:click="sort_apts(2)" class="my-appointments__status-ctas--status-cta">{{App::isLocale('ar')? 'ملغي':'Cancelled'}}</button>
                <button wire:click="sort_apts(3)" class="my-appointments__status-ctas--status-cta">{{App::isLocale('ar')? 'قيد المعالجة':'Pending'}}</button>
            </div>
            <div class="my-appointments__appointments">
                @forelse($appointments as $appt)
        <div class="my-appointments__appointments--appointment" dir="{{App::isLocale('ar')? 'rtl':'ltr'}}">
            <span class="appt-data">{{App::isLocale('ar')? $appt->city_ar:$appt->city_en}}</span>
            <span class="appt-data">{{App::isLocale('ar')? $appt->clinic_ar:$appt->clinic_en}}</span>
            <span class="appt-data">{{$appt->date}}</span>
            <span class="appt-data">{{$appt->time}}</span>
            <span class="appt-data">{{App::isLocale('ar')? $appt->service_ar:$appt->service_en}}</span>
            <span class="appt-data">{{$appt->pickup_address}}</span>
            <span class="appt-data">{{App::isLocale('ar')? $appt->status_ar:$appt->status_en}}</span>
            <span class="appt-data">@if($appt->note) {{$appt->note }} @else ------- @endif</span>
        
        
        
        </div>
        @empty
        <h1 class="no-appt">{{App::isLocale('ar')? 'لا نتائج':'No Results'}}</h1>
        @endforelse
        
            </div>
        </div>
        
        </main>
</div>
