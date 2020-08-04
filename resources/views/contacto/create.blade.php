@extends('layouts.master')

@section('content')
@section('title', 'Datos de Usuario')

    <form method="POST" action="{{ route('contacto.store') }}">
    @csrf
        @include('contacto.form')
    </form>
@endsection

@section('ScriptSection')
<script>

		$('#datetime').datetimepicker({
			format: 'DD/MM/YYYY H:mm',
        });

        
		$('#datepicker').datetimepicker({
			format: 'DD-MM-YYYY',
		
        });
		$('#timepicker').datetimepicker({
			format: 'h:mm A', 
		});

		$('#basic').select2({
			theme: "bootstrap"
		});

		$('#multiple').select2({
			theme: "bootstrap"
		});

		$('#multiple-states').select2({
			theme: "bootstrap"
		});

		$('#tagsinput').tagsinput({
			tagClass: 'badge-info'
		});
		
		$( function() {
			

			$( "#slider" ).slider({
				range: "min",
				max: 100,
				value: 40,
			});
			$( "#slider-range" ).slider({
				range: true,
				min: 0,
				max: 500,
				values: [ 75, 300 ]
			});
		} );
	</script>
@endsection