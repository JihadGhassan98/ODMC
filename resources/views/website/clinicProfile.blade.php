@include('common.head')
<title>ODMC | {{App::isLocale('ar')? 'ملف العيادة':'Clinic Profile'}}</title>

<link rel="stylesheet" href="{{asset('css/clinicProfile.css')}}">
<link rel="stylesheet" href="{{asset('css/homePage.css')}}">
</head>
@include('common.navbar')
@livewire('clinic.profile-page')
@include('common.footer')
@include('common.close')