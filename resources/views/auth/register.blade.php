<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" dir="{{App::isLocale('ar')?'rtl':'ltr'}}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{App::isLocale('ar')? 'الاسم':'Name'}}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ App::isLocale('ar')? 'البريد الالكتروني':'Email' }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>
            <div class="mt-4">
                <x-jet-label for="phone" value="{{App::isLocale('ar')?'رقم الهاتف':'Phone Number' }}" />
                <x-jet-input id="phone" class="block mt-1 w-full" type="text" name="phone" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{App::isLocale('ar')?'كلمة المرور':'Password' }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation"
                    value="{{App::isLocale('ar')?'تأكيد كلمة المرور':'Confirm Password' }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="gender" value="{{App::isLocale('ar')?'الجنس':'Gender' }}" />
                <select name="gender" required id="">
                    <option value="" selected>--{{App::isLocale('ar')? 'اختر':'Choose'}}--</option>
                    <option value="male">{{App::isLocale('ar')? 'ذكر':'Male'}}</option>
                    <option value="female">{{App::isLocale('ar')? 'انثى':'Female'}}</option>
                </select>
            </div>
            <div class="mt-4">
            <x-jet-label for="birth" value="{{App::isLocale('ar')?'تاريخ الميلاد':'Birthdate' }}" />
            <input required name="birth" type="date">
            </div>


            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-jet-label for="terms">
                    <div class="flex items-center">
                        <x-jet-checkbox name="terms" id="terms" />

                        <div class="ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                                class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of
                                Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                                class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy
                                Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-jet-label>
            </div>
            @endif

            <div class="flex items-center justify-between mt-4" dir="{{App::isLocale('ar')?'rtl':'ltr'}}">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ App::isLocale('ar')?'هل لديك حساب؟':'Already Registered?' }}
                </a>

                <x-jet-button class="ml-4">
                    {{ App::isLocale('ar')?'التسجيل':'Register' }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
