<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" title="" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Hasło')" />


            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        {{--        <div class="block mt-4">--}}
        {{--            <label for="remember_me" class="inline-flex items-center">--}}
        {{--                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">--}}
        {{--                <span class="ml-2 text-sm text-gray-600">{{ __('Zapamiętaj mnie') }}</span>--}}
        {{--            </label>--}}
        {{--        </div>--}}

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ml-3">
                {{ __('Zaloguj się') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>





{{--<div style="width:1000px; margin:auto; margin-top: 100px">

    <div style = "width: fit-content;margin:auto">
        <a style="font-size: 48px; font-family: Arial">Gabinety</a>
    </div>

    <div style="width:fit-content; margin: auto; margin-top: 300px;">
        <form>
          <div>
            <label for="email">Email</label><br>
            <input type="email" style="margin:5px 0 15px 0;" id="email" placeholder="jan.jan@gabinety.com" required>
          </div>
          <div>
            <label for="password">Hasło</label><br>
            <input type="password" id="password" style="margin-top:5px;" placeholder="hasło" required>
          </div><br>
          <button type="submit">Zaloguj się</button>
        </form>
    </div>

</div>--}}
