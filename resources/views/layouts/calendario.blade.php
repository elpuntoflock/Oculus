@extends('layouts.master')
@push('headerSection')

    <link href="{{ asset('css/main.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/plugin/fullcalendar/main.js') }}"></script>
    <script src="{{ asset('js/plugin/fullcalendar/locales/es-us.js') }}"></script>
    
@endpush

@section('content')
@section('title', 'Calendario')

    <div id='calendar'></div>

@endsection

@push('scriptsSection')
<script>

document.addEventListener('DOMContentLoaded', function() {
    
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    locale: 'es-us',   
    buttonText: {
      today: "Hoy",
      month: "Mes",
      week: "Semana",
      day: "Día",
      list: "Agenda",
      allday: "Todo el día",
    },
    buttonIcons:{
        prev: 'la flaticon-left-arrow',
        next: 'la flaticon-right-arrow',
        prevYear: 'la flaticon-left-double-arrow',
        nextYear: 'la flaticon-right-double-arrow'
    },
headerToolbar: {
  left: 'prev,next today',
  center: 'title',
  right: 'dayGridMonth,timeGridWeek,timeGridDay'
},

weekText: "Sm",
allDayText: "Todo el día",
moreLinkText: "más",
noEventsText: "No hay eventos para mostrar",
initialDate: '2020-06-12',
navLinks: true, // can click day/week names to navigate views
selectable: true,
selectMirror: true,
select: function(arg) {
  var title = prompt('Event Title:');
  if (title) {
    calendar.addEvent({
      title: title,
      start: arg.start,
      end: arg.end,
      allDay: arg.allDay
    })
  }
  calendar.unselect()
},
eventClick: function(arg) {
  if (confirm('Are you sure you want to delete this event?')) {
    arg.event.remove()
  }
},
editable: true,
dayMaxEvents: true, // allow "more" link when too many events
events: [
  {
    title: 'All Day Event',
    start: '2020-06-01'
  },
  {
    title: 'Long Event',
    start: '2020-06-07',
    end: '2020-06-10'
  },
  {
    groupId: 999,
    title: 'Repeating Event',
    start: '2020-06-09T16:00:00'
  },
  {
    groupId: 999,
    title: 'Repeating Event',
    start: '2020-06-16T16:00:00'
  },
  {
    title: 'Conference',
    start: '2020-06-11',
    end: '2020-06-13'
  },
  {
    title: 'Meeting',
    start: '2020-06-12T10:30:00',
    end: '2020-06-12T12:30:00'
  },
  {
    title: 'Lunch',
    start: '2020-06-12T12:00:00'
  },
  {
    title: 'Meeting',
    start: '2020-06-12T14:30:00'
  },
  {
    title: 'Click for Google',
    url: 'http://google.com/',
    start: '2020-06-28'
  }
]
});

  calendar.render();
});

</script>

@endpush
