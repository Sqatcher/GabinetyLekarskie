<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Uprawnienia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form method="POST">
                    <div style="margin: auto;width: 100%;align-content: center; padding-bottom: 20px; padding-top: 20px;">
                        <h1 class="font-semibold text-gray-800 leading-tight" style="text-align: center;font-size: 2.25rem;">
                            {{ __('Użytkownicy') }}
                        </h1>
                    </div>

                    <table class="min-w-full divide-y divide-gray-200" >
                        <thead class="bg-gray-50" >
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider" style="vertical-align: middle; text-align: center;">
                                Nazwa roli
                            </th>
                            <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider" style="vertical-align: middle; text-align: center;">
                                Ma dostęp do sekcji użytkownicy
                            </th>
                            <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider" style="vertical-align: middle; text-align: center;">
                                Może zakładać konta jak chce
                            </th>
                            <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider" style="vertical-align: middle; text-align: center;">
                                Może zakładać konta w swojej placówce
                            </th>
                            <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider" style="vertical-align: middle; text-align: center;">
                                Może edytować i usuwać konta wszystkich
                            </th>
                            <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider" style="vertical-align: middle; text-align: center;">
                                Może edytować i usuwać konta w swojej placówce
                            </th>

                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="usersTable" style="vertical-align: middle; text-align: center; " >

                            @csrf
                            @foreach($roles as $role)
                                <tr>
                                    <td class="px-6 py-4" style="text-align: left;">
                                        {{$role->name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <input type="checkbox" id="see_user{{$role->id}}" name="see_user{{$role->id}}" value="1"
                                        @if($role->users & 1)
                                            checked
                                        @endif/>
                                    </td>
                                    <td class="px-6 py-4">
                                        <input type="checkbox" id="create_user{{$role->id}}" name="create_user{{$role->id}}" value="2"
                                               @if($role->users & 2)
                                                   checked
                                            @endif/>
                                    </td>
                                    <td class="px-6 py-4">
                                        <input type="checkbox" id="create_facility_user{{$role->id}}" name="create_facility_user{{$role->id}}" value="4"
                                               @if($role->users & 4)
                                                   checked
                                            @endif/>
                                    </td>
                                    <td class="px-6 py-4">
                                        <input type="checkbox" id="edit_user{{$role->id}}" name="edit_user{{$role->id}}" value="8"
                                               @if($role->users & 8)
                                                   checked
                                            @endif/>
                                    </td>
                                    <td class="px-6 py-4">
                                        <input type="checkbox" id="edit_facility_user{{$role->id}}" name="edit_facility_user{{$role->id}}" value="16"
                                               @if($role->users & 16)
                                                   checked
                                            @endif/>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div style="margin: auto;width: 100%;align-content: center; padding-bottom: 20px; padding-top: 20px;">
                        <h1 class="font-semibold text-gray-800 leading-tight" style="text-align: center;font-size: 2.25rem;">
                            {{ __('Harmonogramy') }}
                        </h1>
                    </div>

                    <table class="min-w-full divide-y divide-gray-200" >
                        <thead class="bg-gray-50" >
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider" style="vertical-align: middle; text-align: center;">
                                Nazwa roli
                            </th>
                            <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider" style="vertical-align: middle; text-align: center;">
                                Ma dostęp do sekcji harmonogramy
                            </th>
                            <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider" style="vertical-align: middle; text-align: center;">
                                Może dodawać harmonogramy jak chce
                            </th>
                            <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider" style="vertical-align: middle; text-align: center;">
                                Może dodawać harmonogramy w swojej placówce
                            </th>
                            <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider" style="vertical-align: middle; text-align: center;">
                                Może edytować i usuwać wszystkie harmonogramy
                            </th>
                            <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider" style="vertical-align: middle; text-align: center;">
                                Może edytować i usuwać harmonogramy w swojej placówce
                            </th>

                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="usersTable" style="vertical-align: middle; text-align: center;" >

                        @csrf
                        @foreach($roles as $role)
                            <tr>
                                <td class="px-6 py-4" style="text-align: left;">
                                    {{$role->name}}
                                </td>
                                <td class="px-6 py-4">
                                    <input type="checkbox" id="see_schedules{{$role->id}}" name="see_schedules{{$role->id}}" value="1"
                                           @if($role->schedules & 1)
                                               checked
                                        @endif/>
                                </td>
                                <td class="px-6 py-4">
                                    <input type="checkbox" id="create_schedules{{$role->id}}" name="create_schedules{{$role->id}}" value="2"
                                           @if($role->schedules & 2)
                                               checked
                                        @endif/>
                                </td>
                                <td class="px-6 py-4">
                                    <input type="checkbox" id="create_facility_schedules{{$role->id}}" name="create_facility_schedules{{$role->id}}" value="4"
                                           @if($role->schedules & 4)
                                               checked
                                        @endif/>
                                </td>
                                <td class="px-6 py-4">
                                    <input type="checkbox" id="edit_schedules{{$role->id}}" name="edit_schedules{{$role->id}}" value="8"
                                           @if($role->schedules & 8)
                                               checked
                                        @endif/>
                                </td>
                                <td class="px-6 py-4">
                                    <input type="checkbox" id="edit_facility_schedules{{$role->id}}" name="edit_facility_schedules{{$role->id}}" value="16"
                                           @if($role->schedules & 16)
                                               checked
                                        @endif/>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div style="margin: auto;width: 100%;align-content: center; padding-bottom: 20px; padding-top: 20px;">
                        <h1 class="font-semibold text-gray-800 leading-tight" style="text-align: center;font-size: 2.25rem;">
                            {{ __('Magazyn') }}
                        </h1>
                    </div>

                    <table class="min-w-full divide-y divide-gray-200" >
                        <thead class="bg-gray-50" >
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider" style="vertical-align: middle; text-align: center;">
                                Nazwa roli
                            </th>
                            <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider" style="vertical-align: middle; text-align: center;">
                                Ma dostęp do swojego magazyu
                            </th>
                            <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider" style="vertical-align: middle; text-align: center;">
                                Ma dostęp do wszystkich magazynów
                            </th>
                            <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider" style="vertical-align: middle; text-align: center;">
                                Może edytować stan przedmiotów w swoim magazynie
                            </th>
                            <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider" style="vertical-align: middle; text-align: center;">
                                Może edytować stan przedmiotów we wszystkich magazynach
                            </th>

                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="usersTable" style="vertical-align: middle; text-align: center;" >

                        @csrf
                        @foreach($roles as $role)
                            <tr>
                                <td class="px-6 py-4" style="text-align: left;">
                                    {{$role->name}}
                                </td>
                                <td class="px-6 py-4">
                                    <input type="checkbox" id="see_facility_storage{{$role->id}}" name="see_facility_storage{{$role->id}}" value="1"
                                           @if($role->storage & 1)
                                               checked
                                        @endif/>
                                </td>
                                <td class="px-6 py-4">
                                    <input type="checkbox" id="see_storage{{$role->id}}" name="see_storage{{$role->id}}" value="2"
                                           @if($role->storage & 2)
                                               checked
                                        @endif/>
                                </td>
                                <td class="px-6 py-4">
                                    <input type="checkbox" id="edit_facility_storage{{$role->id}}" name="edit_facility_storage{{$role->id}}" value="4"
                                           @if($role->storage & 4)
                                               checked
                                        @endif/>
                                </td>
                                <td class="px-6 py-4">
                                    <input type="checkbox" id="edit_storage{{$role->id}}" name="edit_storage{{$role->id}}" value="8"
                                           @if($role->storage & 8)
                                               checked
                                        @endif/>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div style="width:20%; margin-left: 30px; margin-top: 20px; display: inline-block;">
                        <x-input-label for="current_password" :value="__('Wprowadź hasło')" />
                        <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                    </div>
                    <div class="flex items-center gap-4" style="display: inline-block; margin-left: 20px">
                        <x-primary-button id="click_form">{{ __('Zapisz') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

