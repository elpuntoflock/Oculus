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

    <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog ">
        <form method="POST" autocomplete="off" action="{{ route('evento.store') }}">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New message</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              @csrf
                <div class="form-group form-group-default">
                  <label for="title" class="col-form-label">Descripción del evento</label>
                  <input id="title" name= "title" type="text" class="form-control" autofocus required>
                </div>
                <div class="form-group form-group-default">
                  <div class="input-group mb-0">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="startLbl">Inicio</span>
                    </div>
                    <input id="start" name="start" type="datetime-local" class="form-control"  aria-label="Inicio" aria-describedby="startLbl">
                  
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="endLbl">Fin</span>
                    </div>
                    <input id="end" name= "end" type="datetime-local" class="form-control"  aria-label="Fin" aria-describedby="endLbl">
                  </div>
                </div>
                <div class="form-check">
                      <label class="form-check-label">
                        <input id="allDay" name= "allDay" class="form-check-input" type="checkbox" value="true">
                        <span class="form-check-sign">Todo el día</span>
                      </label>
                    
                <div class="form-group form-group-default">
                  <label for="allDay2" class="col-form-label">Todo el día:</label>
                  <input id="allDay2" name= "allDay2" type="text" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-danger" data-dismiss="modal">Close</button>
              <button class="btn btn-success">Grabar evento</button>
            </div>
          </div>
        </form>
      </div>
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
        weekText: "Sm",
        allDayText: "Todo el día",
        moreLinkText: "más",
        noEventsText: "No hay eventos para mostrar",
        nowIndicator : true,
        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        selectMirror: true,
        
        select: function(arg) 
        {
          var fechaStart = new Date(arg.start);
          var fechaEnd = new Date(arg.end);
          fechaStart = fechaStart.toISOString();
          fechaStart = fechaStart.substr(0, fechaStart.length -1);
          fechaEnd = fechaEnd.toJSON();
          fechaEnd = fechaEnd.substr(0, fechaEnd.length -1);

          $('#eventModal').modal('show');
          $('#start').val (fechaStart);
          $('#end').val (fechaEnd);
          $('#allDay').val (arg.allDay); 
          if  (arg.allDay ) {
            document.getElementById("allDay").checked = true;
          }
         
          $('#inicio').val (arg.start.toJSON());

          var title = ''; // prompt('Event Title:');
          if (title) 
          {
            calendar.addEvent({
              title: title,
              start: arg.start,
              end: arg.end,
              allDay: arg.allDay
            })
          }
          //calendar.unselect()
        },
        eventClick: function(arg) 
        {
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
@endpush
