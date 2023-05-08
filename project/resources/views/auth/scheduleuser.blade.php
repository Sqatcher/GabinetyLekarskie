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
    function setUser() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            defaultView : 'agendaWeek',
            // put your options and callbacks here
            events : [
                    @foreach($userSchedules as $task)
                {
                    title : '{{ $task->schedule_owner }}',
                    backgroundColor : '{{ $array[$task->type] }}',
                    start : '{{ date_format(date_create($task->date_start), "Y-m-dTH:i:s") }}',
                    end : '{{ date_format(date_create($task->date_end), "Y-m-dTH:i:s") }}'
                },
                @endforeach
            ]
        })
    }

    function readyUp() {
        setUser();
    }

    $(document).ready(readyUp);

</script>

<x-app-layout>
    <h3 id="calendarTitle" style="font-size:28px; margin-left: 10%; margin-bottom: 10px;">{{$userName}} {{$userSurname}}</h3>
    <div style="margin: auto; width: 60%" id="calendar">

    </div>
</x-app-layout>
