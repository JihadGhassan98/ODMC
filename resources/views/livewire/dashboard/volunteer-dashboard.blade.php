<div>
    <main class="v-dashboard" dir="{{App::isLocale('ar')? 'rtl':'ltr'}}">

 
<div class="v-dashboard__toolbar">
<div class="v-dashboard__toolbar--tool">
    <span class="tool-name">{{App::isLocale('ar')? 'تغيير المدينة الحالية':'Change Current City'}}:</span>
<select name="city_id" wire:change="changeCurrentCity()" wire:model="currCity" id="">
    <option selected value="{{$currVolunteer->current_city_id}}">
        @for($i=0; $i < count($cities);$i++)
        @if($cities[$i]->id == $currVolunteer->current_city_id )
        {{App::isLocale('ar')? $cities[$i]->name_ar:$cities[$i]->name_en }} ({{App::isLocale('ar')? 'الحالية':'Current'}})
        @endif
        @endfor
    </option>
        @foreach( $cities as $city)
        <option  value="{{$city->id}}">{{App::isLocale('ar')? $city->name_ar:$city->name_en }}</option>
        @endforeach
    </select>
</div>

<div class="v-dashboard__toolbar--tool points">
    <span class="tool-name">
        {{App::isLocale('ar')? 'النقاط':'Points'}}:
    </span>
    <span class="tool-data">{{$currVolunteer->points}}</span>
</div> 
</div>

<div class="db-body" dir="{{App::isLocale('ar')?  'rtl':'ltr'}}">
    <span class="db-body__saperator">{{App::isLocale('ar')? 'طلبات التطوع':'Volunteer Requests'}}</span>
    <div class="v-dashboard__user-appts">
        @forelse($users as $user)
        <div class="v-dashboard__user-appts--user-data">
            <span class="username">{{$user->name}}</span>
            @if(App::isLocale('ar'))
            <span class="user-field">{{$user->gender == 'male' ? 'ذكر':'أنثى'}}</span>
            @else
            <span class="user-field">{{$user->gender == 'male' ? 'Male':'Female'}}</span>
            @endif
            <span class="user-field">{{$user->phone}}</span>
            <span class="user-field">{{$user->email}}</span>
        </div>
        @forelse($this->getAppts($user->id) as $appt)
        <div class="v-dashboard__user-appts--appt-info">
            <span class="appt-field">{{$appt->city_ar}}</span>
            <span class="appt-field">{{$appt->clinic_ar}}</span>
            <span class="appt-field">{{$appt->date}} - {{$appt->time}}</span>
            <span class="appt-field">{{$appt->pickup_address}}</span>
            @if($this->currVolID == $appt->volunteer_id)
            <button wire:click="removeFromList({{$appt->id}})" class="appt-cta appt-remove">{{App::isLocale('en')? 'Remove From List':'إزالة من  القائمة'}}</button>
            @else
            <button wire:click="addToList({{$appt->id}})" class="appt-cta">{{App::isLocale('en')? 'Add To List':'إضافة للقائمة'}}</button>

            @endif
        </div>
        @empty
        <span class="no-apts">{{App::isLocale('ar')? 'لا يوجد مواعيد':'No Appointments'}}</span>
        @endforelse
    @empty
    <span class="no-users-found">{{App::isLocale('ar')? 'لا يوجد طلبات':'No Requests'}}</span>
    
    @endforelse
    </div>
</div>





</main>
</div>
