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

    <div class="users_need_help">
      <div class="user_list">
       <div class="user_data">
       </div>
      </div>
    </div>

</div>




</main>
</div>
