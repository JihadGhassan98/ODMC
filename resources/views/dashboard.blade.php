<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold h2-text bg-color-odmc leading-tight">
            {{ App::isLocale('ar')? 'مرحبآ،':'Hello,' }}
             @auth
             {{Auth::user()->name}}!
             @endauth
        </h2>
    </x-slot>

    <div class="">
        <div class="">
            <div class="bg-white">
              @include('Dashboard.DB_welcome')
            </div>
        </div>
    </div>
</x-app-layout>



