	<!-- Notificaciones  -->
	<script>
	 	function msgalerta(){
            @if(count($errors) > 0) 
			var placementFrom = "top";
			var placementAlign = "right";
			var state = "warning";
			var style = "withicon";
			var content = {};
            content.message = "";
            
			@foreach($errors->all() as $error)
              content.message += "{!!$error!!}"  + '</br>';
  			@endforeach
  	
			content.title = 'Titulo Mensaje';
			if (style == "withicon") {
				content.icon = 'fa fa-bell';
			} else {
				content.icon = 'none';
			}
			content.url = '';
			content.target = '_blank';

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
	