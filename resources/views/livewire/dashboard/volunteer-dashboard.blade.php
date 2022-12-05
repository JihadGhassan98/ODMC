<div>
    <main class="v-dashboard" dir="{{App::isLocale('ar')? 'rtl':'ltr'}}">

 
<div class="v-dashboard__toolbar">
<div class="v-dashboard__toolbar--tool">
    <span class="tool-name">{{App::isLocale('ar')? 'المدينة الحالية':'Current City'}}:</span>
<select name="city_id" wire:change="changeCurrentCity()" wire:model="currCity" id="">
        @foreach( $cities as $city)
        <option value="{{$city->id}}">{{App::isLocale('ar')? $city->name_ar:$city->name_en }}</option>
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


    </main>
</div>
