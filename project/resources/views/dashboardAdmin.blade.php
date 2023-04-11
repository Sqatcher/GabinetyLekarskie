<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<?php
    $array = [
        '1' => 'red',
        '2' => 'blue',
        ];
?>
<script>
    function setRooms() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            events : [
                    @foreach($roomSchedules as $task)
                {
                    title : '{{ $task->schedule_owner }}',
                    backgroundColor : '{{ $array[$task->type] }}',
                    start : '{{ date_format(date_create($task->date_start), "Y-m-d") }}',
                    end : '{{ date_format(date_create($task->date_end), "Y-m-d") }}'
                },
                @endforeach
            ]
        })
    }

    function setUsers() {
        $('#calendar2').fullCalendar({
            events : [
                    @foreach($userSchedules as $task)
                {
                    title : '{{ $task->schedule_owner }}',
                    backgroundColor : '{{ $array[$task->type] }}',
                    start : '{{ date_format(date_create($task->date_start), "Y-m-d") }}',
                    end : '{{ date_format(date_create($task->date_end), "Y-m-d") }}'
                },
                @endforeach
            ]
        })
    }

    function showRooms() {
        document.getElementById("calendar").style.display = "block";
        document.getElementById("calendar2").style.display = "none";
    }

    function showUsers() {
        document.getElementById("calendar2").style.display = "block";
        document.getElementById("calendar").style.display = "none";
    }

    function readyUp() {
        $( "#RoomButton" ).on("click", showRooms);
        $( "#UserButton" ).on("click", showUsers);
        setRooms();
        setUsers();
        showRooms();
    }

    $(document).ready(readyUp);

</script>

<x-app-layout>
    <button id="RoomButton">Sale</button>
    <button id="UserButton">Pracownicy</button>

    <div style="margin: auto; width: 60%" id="calendar">

    </div>

    <div style="margin: auto; width: 60%" id="calendar2">

    </div>
</x-app-layout>
