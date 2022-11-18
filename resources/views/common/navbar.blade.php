<nav class="navbar">

<div class="navbar__logo-lang">
    <img src="systemImages/ODMC.png" alt="" class="navbar__logo-lang--logo">
    @if(App::isLocale('en'))
    <a href="{{url('lang/ar')}}" class="navbar__logo-lang--lang">العربية</a>
@else
<a href="{{url('lang/en')}}" class="navbar__logo-lang--lang">English</a>

@endif
</div>

<div class="navbar__links  desktop-links">
    <a href="#" class="navbar__links--link">{{App::isLocale('ar')? 'الرئيسية':'Home'}}</a>
    <a href="#" class="navbar__links--link">{{App::isLocale('ar')? 'العيادات':'Clinics'}}</a>
    <a href="#" class="navbar__links--link">{{App::isLocale('ar')? 'العروض':'Offers'}}</a>
    <a href="#" class="navbar__links--link">{{App::isLocale('ar')? 'من نحن':'About Us'}}</a>
    <a href="#" class="navbar__links--link">{{App::isLocale('ar')? 'تواصل معنا':'Contact Us'}}</a>
    <a href="#" class="navbar__links--link">{{App::isLocale('ar')? 'انضم لنا ':'Join Us'}}</a>
</div>

<button class="mobile-nav-cta" onclick="show_nav()"><i class="fa fa-bars" aria-hidden="true"></i></button>


<div class="mobile-links">
<button onclick="hide_nav()" class="mobile-links__close-cta"><i class="fa-solid fa-xmark"></i></button>



</d>
</nav>

