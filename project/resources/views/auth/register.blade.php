<x-guest-layout>
    <form method="POST" action="{{ url('create') }}">
        @csrf

        <!-- name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Imię')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- surname -->
        <div class="mt-4">
            <x-input-label for="surname" :value="__('Nazwisko')" />
            <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')"  />
            <x-input-error :messages="$errors->get('surname')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')"  />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        @if( Auth::user()->role == 1 )
        <!-- Facility -->
        <div>
            <x-input-label for="placówka" :value="__('Placówka')" />
            <select name="facility" id="facility">
                <option name="facility" value="">--- Wybierz placówkę ---</option>
                <option value=1>F1</option>
                <option value=2>F2</option>
                <option value=3>F3</option>
                <option value=4>F4</option>
                <option value=5>F5</option>
            </select>
            <x-input-error :messages="$errors->get('facility')" class="mt-2" />
        </div>
        @endif

        <!-- Role -->
        <div>
            <x-input-label for="rola" :value="__('Rola')" />
            <select name="role" id="role">
                <option value="">--- Wybierz rolę ---</option>
                <!-- <option value=1 selected>Admin</option> -->
                @if( Auth::user()->role == 1 )
                    <option value=2 >Kierownik</option>
                @endif
                <option value=3>Pracownik</option>
                <option value=4>Księgowy</option>
                <option value=5>Magazynier</option>
                <option value=6>Recepcjonista</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Hasło')" />

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                           autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Repeat Password -->
        <div class="mt-4">
            <x-input-label for="repeat_password" :value="__('Powtórz hasło')" />

            <x-text-input id="repeat_password" class="block mt-1 w-full"
                          type="password"
                          name="repeat_password"  />

            <x-input-error :messages="$errors->get('repeat_password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Załóż konto') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
