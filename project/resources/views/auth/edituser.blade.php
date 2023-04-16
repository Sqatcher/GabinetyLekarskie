
<x-guest-layout>
    <form method="POST" action="{{url("update", $user->id)}}">
        @csrf

        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Imię')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$user->name}}"  />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Surname -->
        <div class="mt-4">
            <x-input-label for="surname" :value="__('Nazwisko')" />
            <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" value="{{$user->surname}}"  />
            <x-input-error :messages="$errors->get('surname')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" value="{{$user->email}}"  />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        @if( Auth::user()->role == 1 )
        <!-- Facility -->
        <div>
            <label for="facility">Placówka:</label>
            <select name="facility" id="facility">
                <option value="">--- Wybierz placówkę ---</option>
                <!-- <option value=1 selected>All</option> -->
                <option value=1 {{ $user->facility == 1 ? 'selected' : '' }}>F1</option>
                <option value=2 {{ $user->facility == 2 ? 'selected' : '' }}>F2</option>
                <option value=3 {{ $user->facility == 3 ? 'selected' : '' }}>F3</option>
                <option value=4 {{ $user->facility == 4 ? 'selected' : '' }}>F4</option>
                <option value=5 {{ $user->facility == 5 ? 'selected' : '' }}>F5</option>
            </select>
            <x-input-error :messages="$errors->get('facility')" class="mt-2" />
        </div>
        @endif
        <!-- Role -->
        <div>
            <label for="role">Rola:</label>
            <select name="role" id="role">
                <option value="">--- Wybierz rolę ---</option>
                <!-- <option value=1 selected>Admin</option> -->
                @if( Auth::user()->role == 1 )
                <option value=2 {{ $user->role == 2 ? 'selected' : '' }}>Kierownik</option>
                @endif
                <option value=3 {{ $user->role == 3 ? 'selected' : '' }}>Pracownik</option>
                <option value=4 {{ $user->role == 4 ? 'selected' : '' }}>Księgowy</option>
                <option value=5 {{ $user->role == 5 ? 'selected' : '' }}>Magazynier</option>
                <option value=6 {{ $user->role == 6 ? 'selected' : '' }}>Recepcjonista</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Edytuj konto') }}
            </x-primary-button>
        </div>
    </form>
    <form action="{{url("delete", $user->id)}}" method="POST">
        @csrf
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4 bg-red-500 hover:bg-red-600">
                {{ __('Usuń') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
