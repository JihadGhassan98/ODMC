<div>
<main class="db-body">

<span class="db-body__saperator">{{App::isLocale('ar')? 'مواعيدي':'My Appointments'}}</span>

<div class="my-appointments">
    <div class="my-appointments__appointments">
        @forelse($appointments as $appt)
<div class="my-appointments__appointments--appointment">
    <span class="appt-data">{{App::isLocale('ar')? $appt->city_ar:$appt->city_en}}</span>
    <span class="appt-data">{{App::isLocale('ar')? $appt->clinic_ar:$appt->clinic_en}}</span>
    <span class="appt-data">{{$appt->date}} - {{$appt->time}}</span>
    <span class="appt-data">{{App::isLocale('ar')? $appt->service_ar:$appt->service_en}}</span>
    <span class="appt-data">{{$appt->pickup_address}}</span>
    <span class="appt-data">@if($appt->note) {{$appt->note }} @else ------- @endif</span>
    <span class="appt-data">{{App::isLocale('ar')? $appt->status_ar:$appt->status_en}}</span>
    <span class="appt-data">@if($appt->doctor_id) {{$this->getDoctorData($appt->doctor_id)->first_name . ' '.$this->getDoctorData($appt->doctor_id)->last_name  }} @else ------- @endif</span>


</div>
@empty
<h1 class="no-appt">{{App::isLocale('ar')? 'لا نتائج':'No Results'}}</h1>
@endforelse

    </div>
</div>

</main>

</div>
