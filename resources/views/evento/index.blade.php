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
          var idEvento  = "{{ route('evento.update','') }}";
          idEvento = idEvento +'/' + info.event.id;
          fechaStart = fechaStart.toISOString();
          fechaStart = fechaStart.substr(0, fechaStart.length -1);
          fechaEnd = fechaEnd.toISOString();
          fechaEnd = fechaEnd.substr(0, fechaEnd.length -1);          

          $('#ModalLabel').html('Actualizar Evento');
          $("#formModalInsert").attr('action',  idEvento  );
          $("#_method").val('PUT');
          $("#id").val(info.event.id);
          $("#title").val(info.event.title);
          $("#start").val(fechaStart);
          $("#end").val(fechaEnd);
          document.getElementById("allDay").checked = info.event.allDay ? true : false;
          document.getElementById("startEditable").checked = info.event.startEditable  ? true : false;
          document.getElementById("durationEditable").checked = info.event.durationEditable == 1 ? true : false;
          document.getElementById("overlap").checked = info.event.overlap == 1 ? true : false;
          $("#borderColor").val(info.event.borderColor);
          $('#textColor').val (info.event.allDay ? 'white' : info.event.textColor);
          $('#backgroundColor').val (info.event.allDay ? info.event.backgroundColor : 'white');
          $('#evento-ejemplo').attr( "style", "border-color: " + info.event.borderColor + "; color: " + info.event.textColor + "; background-color: " + info.event.backgroundColor + ";");

          $('#eventModalInsert').modal('toggle'); 

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
          fechaEnd = fechaEnd.toISOString();
          fechaEnd = fechaEnd.substr(0, fechaEnd.length -1);
          $("#_method").val('');
          $('#start').val (fechaStart);
          $('#end').val (fechaEnd);
          document.getElementById("allDay").checked = arg.allDay ? true : false;
          $('#textColor').val (arg.allDay ? 'white' : 'Deepskyblue');
          $('#backgroundColor').val (arg.allDay ? 'Deepskyblue' : 'white');
          $('#borderColor').val ('Deepskyblue');
          $('#ModalLabel').html('Agregar Evento');
          $("#formModal").attr('action', "{{ route('evento.store') }}");
          $('#eventModalInsert').modal('show'); 

          calendar.unselect()
        },
        eventClick: function(info) 
        {
          var fechaStart = new Date(info.event.start);
          var fechaEnd = new Date(info.event.end);
          var idEvento  = "{{ route('evento.update','') }}";
          idEvento = idEvento +'/' + info.event.id;
          fechaStart = fechaStart.toISOString();
          fechaStart = fechaStart.substr(0, fechaStart.length -1);
          fechaEnd = fechaEnd.toISOString();
          fechaEnd = fechaEnd.substr(0, fechaEnd.length -1);          

          $('#ModalLabel').html('Actualizar Evento');
          $("#formModalInsert").attr('action',  idEvento  );
          $("#_method").val('PUT');
          $("#id").val(info.event.id);
          $("#title").val(info.event.title);
          $("#start").val(fechaStart);
          $("#end").val(fechaEnd);
          document.getElementById("allDay").checked = info.event.allDay ? true : false;
          document.getElementById("startEditable").checked = info.event.startEditable  ? true : false;
          document.getElementById("durationEditable").checked = info.event.durationEditable == 1 ? true : false;
          document.getElementById("overlap").checked = info.event.overlap == 1 ? true : false;
          $("#borderColor").val(info.event.borderColor);
          $('#textColor').val (info.event.allDay ? 'white' : info.event.textColor);
          $('#backgroundColor').val (info.event.allDay ? info.event.backgroundColor : 'white');
          $('#evento-ejemplo').attr( "style", "border-color: " + info.event.borderColor + "; color: " + info.event.textColor + "; background-color: " + info.event.backgroundColor + ";");

          $('#eventModalInsert').modal('toggle'); 

          /* if (!confirm("is this okay?")) {
            info.revert();
          } */
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

  <script>
    $(document).on('ready',function(){
        var SITEURL = "{{ route('evento.update','') }}" ;

      $(btn-ingresar).click(function(){
        var url = SITEURL + '\evento' + $(id);                                     

        $.ajax({     
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },                   
            type: "POST",                 
            url: url,                    
            data: $(formModalInsert).serialize(),
            success: function(data)            
            {
                $(id).html(data);           
            }
         });
        

      });
    });
  </script>
  
@endpush
