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
          daysOfWeek: [ 1, 2, 3,4,5 ], // Monday, Tuesday, Wednesday
          startTime: '08:00', // 8am
          endTime: '17:00' // 6pm
        },
        {
          daysOfWeek: [6], // Thursday, Friday
          startTime: '10:00', // 10am
          endTime: '16:00' // 4pm
        }],
       
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
          if (info.event.start) {
            $("#start").val(fechaStart);    
          } else {
            fechaStart = null;
          }
          if (info.event.end) {
            $("#end").val(fechaEnd);
          } else {
            fechaEnd = null;
          }
          document.getElementById("allDay").checked = info.event.allDay ? true : false;
          document.getElementById("startEditable").checked = info.event.startEditable  ? true : false;
          document.getElementById("durationEditable").checked = info.event.durationEditable ? true : false;
          document.getElementById("overlap").checked = info.event.overlap ? true : false;
          $("#borderColor").val(info.event.borderColor);
          $('#textColor').val (info.event.allDay ? 'white' : info.event.textColor);
          $('#backgroundColor').val (info.event.allDay ? info.event.backgroundColor : 'white');
          $('#evento-ejemplo').attr( "style", "border-color: " + info.event.borderColor + "; color: " + info.event.textColor + "; background-color: " + info.event.backgroundColor + ";");

          $('#eventModalInsert').modal('toggle'); 
          info.revert();
        },
        
        select: function(arg) 
        {
          var fechaStart = new Date(arg.start);
          var fechaEnd = new Date(arg.end);
          fechaStart = fechaStart.toISOString();
          fechaStart = fechaStart.substr(0, fechaStart.length -1);
          fechaEnd = fechaEnd.toISOString();
          fechaEnd = fechaEnd.substr(0, fechaEnd.length -1);


          document.getElementById("allDay").checked = arg.allDay ? true : false;
          $('#textColor').val (arg.allDay ? 'white' : 'Deepskyblue');
          $('#backgroundColor').val (arg.allDay ? 'Deepskyblue' : 'white');
          $('#borderColor').val ('Deepskyblue');
          $('#ModalLabel').html('Agregar Evento');
          $("#formModal").attr('action', "{{ route('evento.store') }}");


          $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "{{ route('evento.create') }}",
            data: {'fechaStart': fechaStart, 'fechaEnd':fechaEnd, 'allDay':arg.allDay},
            dataType: 'html',
          });


          calendar.unselect();
        },
        eventClick: function(info) 
        {
          var fechaStart = new Date(info.event.start);
          fechaStart = fechaStart.toISOString();
          fechaStart = fechaStart.substr(0, fechaStart.length -1);
        
          var fechaEnd = new Date(info.event.end);
          fechaEnd = fechaEnd.toISOString();
          fechaEnd = fechaEnd.substr(0, fechaEnd.length -1);          
          
          var idEvento  = "{{ route('evento.update','') }}";
          idEvento = idEvento +'/' + info.event.id;
          
          
          $('#ModalLabel').html('Actualizar Evento');
          $("#formModalInsert").attr('action',  idEvento  );
          $("#_method").val('PUT');
          $("#id").val(info.event.id);
          $("#title").val(info.event.title);
          if (info.event.start) {
            $("#start").val(fechaStart);    
          } else {
            fechaStart = null;
          }
          if (info.event.end) {
            $("#end").val(fechaEnd);
          } else {
            fechaEnd = null;
          }
          
          document.getElementById("allDay").checked = info.event.allDay ? true : false;
          document.getElementById("startEditable").checked = info.event.startEditable  ? true : false;
          document.getElementById("durationEditable").checked = info.event.durationEditable == 1 ? true : false;
          document.getElementById("overlap").checked = info.event.overlap == 1 ? true : false;
          $("#borderColor").val(info.event.borderColor);
          $('#textColor').val (info.event.allDay ? 'white' : info.event.textColor);
          $('#backgroundColor').val (info.event.allDay ? info.event.backgroundColor : 'white');
          $('#evento-ejemplo').attr( "style", "border-color: " + info.event.borderColor + "; color: " + info.event.textColor + "; background-color: " + info.event.backgroundColor + ";");

          $('#eventModalInsert').modal('toggle'); 
          info.revert;
        },
        
        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        
        events: {!! $eventos->toJson() !!},
        
        }
      );
      calendar.setOption('locale', 'es-us');
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
