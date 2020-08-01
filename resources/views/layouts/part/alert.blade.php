	<!-- Notificaciones  -->
	<script>
	 	function msgalerta(){
			var placementFrom = "top";
			var placementAlign = "right";
			var style = "withicon";
			var content = {};
				content.message = ""; 
				content.url = '';
				content.target = '_blank';
            @if(count($errors) > 0) 
				var state = "warning";
				@foreach($errors->all() as $error)
					content.message += "{!!$error!!}"  + '</br>';
				@endforeach
		
				content.title = 'Error';
				if (style == "withicon") {
					content.icon = 'fa fa-bell';
				} else {
					content.icon = 'none';
				}
				

				$.notify(content,{
					type: state,
					placement: {
						from: placementFrom,
						align: placementAlign
					},
					time: 1000,
					delay: 0,
				});
			@endif

			@if (session('status'))

				var state = "success";
				content.message = "{{ session('status') }}";
				content.title = 'Mensaje';
				if (style == "withicon") {
					content.icon = 'fa fa-bell';
				} else {
					content.icon = 'none';
				}


				$.notify(content,{
					type: state,
					placement: {
						from: placementFrom,
						align: placementAlign
					},
					time: 1000,
					delay: 0,
				});
			@endif
		};
	</script>
	