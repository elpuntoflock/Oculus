	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Azzara Bootstrap 4 Admin Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('img/icon.ico') }}" type="image/x-icon"/>

	<!-- CSS Files -->
    <!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/azzara.min.css') }}" rel="stylesheet">
	
	<link href="{{ asset('css/bootstrap-datetimepicker.css') }}" rel="stylesheet">

	<!-- Fonts and icons -->
	<script src="{{ asset('js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ["{{ asset('css/fonts.css') }}"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

