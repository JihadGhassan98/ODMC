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

    @auth
    <form method="POST" action="{{route('logout')}}" class="navbar__links--link auth-link-2">@csrf <button class="auth-logout">{{App::isLocale('ar')? 'تسجيل الخروج':'Log Out'}}</button></form>
    <a href="{{route('dashboard')}}" class="navbar__links--link auth-link"><img src="/userImages/{{Auth::user()->profile_photo_path}}" alt="" class="auth-img">{{Auth::user()->name}}</a>

    @else
<a href="{{route('register')}}" class="navbar__links--link auth-link-2">{{App::isLocale('ar')? 'التسجيل':'Register'}}</a>
<a href="{{route('login')}}" class="navbar__links--link auth-link">{{App::isLocale('ar')? 'تسجيل الدخول':'Log In'}}</a>

@endauth
</div>

<button class="mobile-nav-cta" onclick="show_nav()"><i class="fa fa-bars" aria-hidden="true"></i></button>


<div id="mobileNav" class="mobile-links">
<button onclick="show_nav()" class="mobile-links__close-cta"><i class="fa-solid fa-xmark"></i></button>
<span class="mobile-links__blank"></span>
@auth
    <a href="{{route('dashboard')}}" class="mobile-links__link auth-link">{{Auth::user()->name}}</a>
@else
<a href="{{route('login')}}" class="mobile-links__link auth-link">{{App::isLocale('ar')? 'تسجيل الدخول':'Log In'}}</a>
<a href="{{route('register')}}" class="mobile-links__link auth-link-2">{{App::isLocale('ar')? 'التسجيل':'Register'}}</a>
@endauth
<a href="#" class="mobile-links__link">{{App::isLocale('ar')? 'الرئيسية':'Home'}}</a>
    <a href="#" class="mobile-links__link">{{App::isLocale('ar')? 'العيادات':'Clinics'}}</a>
    <a href="#" class="mobile-links__link">{{App::isLocale('ar')? 'العروض':'Offers'}}</a>
    <a href="#" class="mobile-links__link">{{App::isLocale('ar')? 'من نحن':'About Us'}}</a>
    <a href="#" class="mobile-links__link">{{App::isLocale('ar')? 'تواصل معنا':'Contact Us'}}</a>
 


</div>
</nav>

