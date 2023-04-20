
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Użytkownicy') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8" style="width: 1130px">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div id="filter_form" style="margin-left: 20px;margin-top: 20px; margin-bottom: 20px;">
                    <form>
                        @csrf
                        <label for="filter_search">Wpisz imię, nazwisko lub email użytkownika</label>
                        <input type="text" class="form-controller" id="filter_search" name="filter_search" style="font-size: medium;"
                               value="{{  (session('user_filter_search') ?? "") == '%' ? '' :  (session('user_filter_search') ?? "") }}">
                        @if($user_role->users & 8)
                            <label for="filter_facility" style="margin-left: 10px;">Obiekt: </label>
                            <select name="filter_facility" id="filter_facility" onchange="filter_facility_select(this.value);">
                                <option value="all" @if (session('user_filter_facility') == "all") selected @endif>wszystkie</option>
                                @if (isset($facilities))
                                    @foreach($facilities as $facility)
                                        <option value="{{$facility->id}}" @if (session('user_filter_facility') == $facility->id ) selected @endif>{{$facility->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        @else
                            <label for="filter_facility" style="margin-left: 10px;" hidden>Obiekt: </label>
                            <select name="filter_facility" id="filter_facility" onchange="filter_facility_select(thisno.value);" hidden>
                                <option value="{{Auth::user()->facility}}" selected>wszystkie</option>
                            </select>
                        @endif
                        <label for="filter_role" style="margin-left: 10px;">Rola:</label>
                        <select name="filter_role" id="filter_role" onchange="filter_role_select(this.value);">
                            <option value="all" @if (session('user_filter_role') == "all") selected @endif>wszystkie</option>
                            @if (isset($roles))
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}" @if (session('user_filter_role') == $role->id ) selected @endif>{{$role->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        <br><br>

                    </form>
                    <button class="button" onclick="reset();">Wyczyść filtry</button>
                    <br>
                </div>

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                            Imię
                        </th>
                        <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                            Nazwisko
                        </th>
                        <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                            Email
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="usersTable">
                    <?php
                    if (isset($users)) {
                        echo $users->content();
                    }
                    ?>
                    {{--@foreach ($users as $user)
/*
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($users as $user)
                        @if( (Auth::user()->role == 1  && $user->role != 1)||  (Auth::user()->role == 2 &&  Auth::user()->facility == $user->facility && $user->role != 2 && $user->role != 1))
*/
                        <tr>
                            <td class="px-6 py-4">
                                <a href="{{ url("edituser", $user->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                    {{ $user->name }}
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ url("edituser", $user->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                    {{ $user->surname }}
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                    {{ $user->email }}
                            </td>
                        </tr>
                        @endif
                    @endforeach
                    !--}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

<script type="text/javascript">
    $('#filter_search').on('keyup',function(){
        let value = $(this).val();
        if(value === ""){
            value = "%";
        }
        $.ajax({
            type : 'get',
            url : '{{URL::to('/user/filter')}}',
            data:{'filter_search':value},
            success:function(data){
                $('#usersTable').html(data);
            }
        });
    })
</script>

<script type="text/javascript">
    function filter_facility_select(val)
    {
        $.ajax({
            type: 'get',
            url: '{{URL::to('/user/filter')}}',
            data: {
                'filter_facility':val
            },
            success: function (data) {
                $('#usersTable').html(data);
            }
        });
    }
</script>

<script type="text/javascript">
    function filter_role_select(val)
    {
        $.ajax({
            type: 'get',
            url: '{{URL::to('/user/filter')}}',
            data: {
                'filter_role':val
            },
            success: function (data) {
                $('#usersTable').html(data);
            }
        });
    }
</script>

<script type="text/javascript">
    function reset()
    {
        $.ajax({
            type: 'get',
            url: '{{URL::to('/user/filter')}}',
            data: {
                'filter_facility' : 'all',
                'filter_role': 'all',
                'filter_search':'%',
            },
            success: function (data) {
                $('#usersTable').html(data);
                document.getElementById('filter_facility').value ='all';
                document.getElementById('filter_role').value ='all';
                document.getElementById('filter_search').value ='';
            }
        });
    }
</script>
