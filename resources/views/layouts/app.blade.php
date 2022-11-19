<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>ODMC - On Demand Medical Care</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Styles -->
        @livewireStyles

        <!-- Scripts -->

  <link rel="stylesheet" href="/css/userAppointments.css">
  <link rel="stylesheet" href="/css/uploadPhoto.css">
  <link rel="stylesheet" href="/css/welcomeUser.css">
  <link rel="stylesheet" href="/css/medicalRecords.css">
  <link rel="stylesheet" href="/css/app.css">
  <script defer src="/js/app.js"></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-color-odmc db-header shadow">
                    <div class="max-w-7xl  py-6 px-1 sm:px-1 lg:px-1">
                        {{ $header }}
                    </div>
                    <div class="db-header-buttons">
    <a href="{{url('/')}}" class="db-header-button">{{App::isLocale('ar')? 'الرئيسية':'Home'}}</a>
    <a href="{{url('/myMedicalRecords')}}" class="db-header-button">{{App::isLocale('ar')? 'بياناتي الطبية':'My Medical Info'}}</a>
    <a href="#" class="db-header-button">{{App::isLocale('ar')? 'العيادات ':'Clinics'}}</a>
    <a href="{{url('/user/profile')}}" class="db-header-button">{{App::isLocale('ar')? 'الملف الشخصي ':'Profile'}}</a>
    <a href="#" class="db-header-button">{{App::isLocale('ar')? 'الابلاغ عن مشكلة ':'Report A Problem '}}</a>
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')
        <script src="{{asset('/js/imageUploader.js')}}"></script>
        @livewireScripts
    </body>
</html>
