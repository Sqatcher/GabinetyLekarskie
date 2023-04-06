<x-guest-layout>
    <form method="POST" action="{{ url('create') }}">
        @csrf

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')"  />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Facility -->
        <div>
            <label for="facility">Placówka:</label>
            <select name="facility" id="facility">
                <option value="">--- Wybierz placówkę ---</option>
                <!-- <option value=1 selected>All</option> -->
                <option value=1>F1</option>
                <option value=2>F2</option>
                <option value=3>F3</option>
                <option value=4>F4</option>
                <option value=5>F5</option>
            </select>
            <x-input-error :messages="$errors->get('facility')" class="mt-2" />
        </div>

        <!-- Role -->
        <div>
            <label for="role">Rola:</label>
            <select name="role" id="role">
                <option value="">--- Wybierz rolę ---</option>
                <!-- <option value=1 selected>Admin</option> -->
                <option value=2>Kierownik</option>
                <option value=3>Pracownik</option>
                <option value=4>Księgowy</option>
                <option value=5>Magazynier</option>
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
