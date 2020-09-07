@extends('layouts.master')
@push('headerSection')
    <!-- Fullcalendar -->
    <link href="{{ asset('css/fullcalendar/main.min.css') }}" rel="stylesheet">
    
    <script src="{{ asset('js/plugin/fullcalendar/main.min.js') }}"></script>
    <script src="{{ asset('js/plugin/fullcalendar/locales/es-us.js') }}"></script>
  
@endpush

@section('content')
@section('title', 'Calendario')

    <div id='calendar'></div>

    <div id="eventModalInsert" name="eventModalInsert" class="modal fade" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
      <form id="formModalInsert" name="formModalInsert" method="POST" autocomplete="off" action="{{ route('evento.store') }}"> 
        @csrf
        @include('evento.form')
      </form>
    </div>

    <div id="eventModalUpdate" name="eventModalUpdate" class="modal fade" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
      <form id="formModalUpdate" name="formModalUpdate" method="POST" autocomplete="off" action="{{ route('evento.store') }}"> 
        @csrf
        @method('PUT') 
        @include('evento.form')
      </form>
    </div>

@endsection

@push('scriptsSection')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, 
      {
        locale: 'es-us',
        timeZone: 'America/Guatemala',
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
        businessHours: [ // specify an array instead
        {
          daysOfWeek: [ 1, 2, 3 ], // Monday, Tuesday, Wednesday
          startTime: '08:00', // 8am
          endTime: '17:00' // 6pm
        },
        {
          daysOfWeek: [ 6], // Thursday, Friday
          startTime: '10:00', // 10am
          endTime: '16:00' // 4pm
        }],
        weekText: "Sm",
        allDayText: "Todo el día",
        moreLinkText: "más",
        noEventsText: "No hay eventos para mostrar",
        nowIndicator : true,
        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        selectMirror: true,
        // Cambios del evento
        eventChange: function(info) {
          var fechaStart = new Date(info.event.start);
          var fechaEnd = new Date(info.event.end);
          var idEvento  = " route('evento.update'," + info.event.id + ") " ;
          fechaStart = fechaStart.toISOString();
          fechaStart = fechaStart.substr(0, fechaStart.length -1);
          //fechaEnd = fechaEnd.toJSON();
          fechaEnd = fechaEnd.toISOString();
          fechaEnd = fechaEnd.substr(0, fechaEnd.length -1);          
        
          alert(idEvento);
          $('#eventModalUpdate #ModalLabel').html('Actualizar Evento');
          $("#eventModalUpdate #formModalUpdate").attr('action',  idEvento  );
          $("#eventModalUpdate #id").val(info.event.id);
          $("#eventModalUpdate #title").val(info.event.title);
          $("#eventModalUpdate #start").val(fechaStart);
          $("#eventModalUpdate #end").val(fechaEnd);
          $('#eventModalUpdate #allDay').val (info.event.allDay); 
          
          $('#eventModalUpdate #evento-ejemplo').attr( "style", "border-color: " + info.event.borderColor + "; color: white; background-color: " + info.event.backgroundColor + ";");

  
          $('#eventModalUpdate').modal('show'); 

          if (!confirm("is this okay?")) {
            info.revert();
          }
        },
        
        select: function(arg) 
        {
          var fechaStart = new Date(arg.start);
          var fechaEnd = new Date(arg.end);
          fechaStart = fechaStart.toISOString();
          fechaStart = fechaStart.substr(0, fechaStart.length -1);
          //fechaEnd = fechaEnd.toJSON();
          fechaEnd = fechaEnd.toISOString();
          fechaEnd = fechaEnd.substr(0, fechaEnd.length -1);

          $('#start').val (fechaStart);
          $('#end').val (fechaEnd);
          $('#allDay').val (arg.allDay); 
          if  (arg.allDay ) {
            document.getElementById("allDay").checked = true;
          }
          $('#ModalLabel').html('Agregar Evento');
          $("#formModal").attr('action', "{{ route('evento.store') }}");
          $('#eventModalInsert').modal('show'); 

          var title = ''; // prompt('Event Title:');
          if (title) 
          {
            calendar.addEvent({
              title: title,
              start: arg.start,
              end: arg.end,
              allDay: arg.allDay,
            })
          }
          //calendar.unselect()
        },
        eventClick: function(arg) 
        {
          $('#eventModalUpdate #ModalLabel').html('Agregar Evento');
          $("#formModalUpdate").attr('action', "{{ route('evento.update'," + arg.id + ") }}");
          $('#eventModalUpdate').modal('show'); 
          if (confirm('Are you sure you want to delete this event?')) {
            arg.event.remove()
          }
        },
        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events: {!! $eventos->toJson() !!},
        
        }
      );

      calendar.render();
    });

  </script>

  <script>
    function colorEvento(color) {
      $('#evento').val(color);
      if (document.getElementById("allDay").checked) {
        $('#evento-ejemplo').attr( "style", "border-color: " + color + "; color: white; background-color: " + color + ";");
        $('#backgroundColor').val(color);
        $('#textColor').val('white');
        $('#borderColor').val(color);
      } else {
          $('#evento-ejemplo').attr( "style", "border-color: " + color + "; color: " + color + "; background-color: white;");  
          $('#backgroundColor').val("white");
          $('#textColor').val(color);
          $('#borderColor').val(color);
      }
    }
  </script>
@endpush
