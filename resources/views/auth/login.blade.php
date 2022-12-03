<x-guest-layout>
    <x-jet-authentication-card>
        
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>
        

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form dir="{{App::isLocale('ar')? 'rtl':'ltr'}}" method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ App::isLocale('ar')?'البريد الالكتروني':'Email' }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ App::isLocale('ar')?'كلمة المرور':'Password' }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ App::isLocale('ar')?'تذكرني':'Remember Me' }}</span>
                </label>
            </div>

            <div class="flex flex-col items-center gap-4 justify-between mt-4">
                @if (Route::has('password.request'))
                    <a class="underline pt-3 text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ App::isLocale('ar')?'نسيت كلمة المرور؟':'Forgot your password?' }}
                    </a>
                @endif
                <a class="underline p-3 text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                        {{ App::isLocale('ar')? 'ليس لديك حساب؟':'Don\'t Have An Account?' }} <b>{{App::isLocale('ar')? 'سجل الآن':'Register'}}</b>
                    </a>

                <x-jet-button class="ml-4">
                    {{ App::isLocale('ar')? 'تسجيل الدخول':'Log In' }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
