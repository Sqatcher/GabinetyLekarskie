
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

        @if( $user_role->users & 8)
            @if(isset($facilities))
             <!-- Facility -->
             <div>
                <label for="facility">Placówka:</label>
                <select name="facility" id="facility">
                    <option value="">--- Wybierz placówkę ---</option>
                 <!-- <option value=1 selected>All</option> -->

                    @foreach($facilities as $facility)
                        <option value={{$facility->id}} {{ $user->facility == $facility->id ? 'selected' : '' }}>{{$facility->name}}</option>
                    @endforeach

                </select>
                <x-input-error :messages="$errors->get('facility')" class="mt-2" />
            </div>
            @endif
        @endif
        <!-- Role -->
        <div>
            <label for="role">Rola:</label>
            <select name="role" id="role">
                <option value="">--- Wybierz rolę ---</option>
                <!-- <option value=1 selected>Admin</option> -->
                @foreach($roles as $role)
                    @if(!($role->users & 8))
                        @if(!($role->users & 16) or !($user_role->users & 16))
                            <option value={{$role->id}} {{ $user->role == $role->id ? 'selected' : '' }}>{{$role->name}}</option>
                        @endif
                    @endif
                @endforeach
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
