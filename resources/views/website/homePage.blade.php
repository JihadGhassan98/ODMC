@include('common.head')
<title>ODMC | {{App::isLocale('ar')? 'الصفحة الرئيسية':'Home'}}</title>

<link rel="stylesheet" href="{{asset('css/homePage.css')}}">
</head>
@include('common.navbar')
@livewire('home.home-page')
@include('common.footer')
@include('common.close')