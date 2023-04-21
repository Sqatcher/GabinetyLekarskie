<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Magazyn') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8" style="width: 800px">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div id="filter_form" style="margin: auto; width: fit-content; padding-top: 35px">
                    <form>
                        @csrf
                        <label for="filter_search">Wpisz nazwę przedmiotu</label>


                        <input type="text" class="form-controller" id="filter_search" name="filter_search" style="font-size: medium;"
                               value="{{  (session('item_filter_search') ?? "") == '%' ? '' :  (session('item_filter_search') ?? "") }}">


                        <label for="filter_facility" style="margin-left: 10px;">Obiekt: </label>
                        <select name="filter_facility" id="filter_facility" onchange="filter_facility_select(this.value);">
                            @if (isset($facilities))
                                @foreach($facilities as $facility)
                                    <option value="{{$facility->id}}" @if (session('item_filter_facility') == $facility->id) selected @endif>{{$facility->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        <br><br>
                    </form>


                    <div style="border: #0c5460 solid 1px; border-radius: 20px; padding: 5px; width: fit-content; background-color: #edf3fc; box-shadow: #6b7280 1px 1px 1px; margin:auto; margin-bottom: 20px">
                    <button class="button" onclick="reset()">Wyczyść filtry</button>
                    </div>
                    <br>


                </div>

                <table class=" divide-y divide-gray-200" style="width:500px; margin: auto; box-shadow: #6b7280 1px 1px 2px">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider" style="width: 400px">
                            Nazwa
                        </th>
                        <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                            Ilość
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="itemsTable">
                    <?php
                    if (isset($items)) {
                        echo $items->content();
                    }
                    ?>
                    </tbody>
                </table>
                <br>
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
            url : '{{URL::to('/storage/filter')}}',
            data:{'filter_search':value},
            success:function(data){
                $('#itemsTable').html(data);
            }
        });
    })

    function filter_facility_select(val)
    {
        $.ajax({
            type: 'get',
            url: '{{URL::to('/storage/filter')}}',
            data: {
                'filter_facility':val
            },
            success: function (data) {
                $('#itemsTable').html(data);
            }
        });
    }

    function reset()
    {
        $.ajax({
            type: 'get',
            url: '{{URL::to('/storage/filter')}}',
            data: {
                'filter_facility' : {{Auth::user()->facility}},
                'filter_search':'%',
            },
            success: function (data) {
                $('#itemsTable').html(data);
                document.getElementById('filter_facility').value = {{Auth::user()->facility}};
                document.getElementById('filter_search').value ='';
            }
        });
    }
</script>
