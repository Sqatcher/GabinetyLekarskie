<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Zaktualizuj hasło') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Upewnij się, że nowe hasło jest wystarczająco długie oraz zawiera cyfry i znaki specjalne, aby pozostać bezpiecznym.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="aktualne_hasło" :value="__('Aktualne hasło')" />
            <x-text-input id="aktualne_hasło" name="aktualne_hasło" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->get('aktualne_hasło')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="hasło" :value="__('Nowe hasło')" />
            <x-text-input id="hasło" name="hasło" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->get('hasło')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="powtórz_hasło" :value="__('Powtórz hasło')" />
            <x-text-input id="powtórz_hasło" name="powtórz_hasło" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->get('powtórz_hasło')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Zapisz') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Zapisane.') }}</p>
            @endif
        </div>
    </form>
</section>
