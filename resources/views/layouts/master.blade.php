<!DOCTYPE html>
<html lang="en">
<head>
<!-- Header -->
@include('layouts.part.header')
@stack('headerSection')
</head>
<body onload="msgalerta()">
	@auth
	<div class="wrapper">
	@endauth
		@auth
			<div class="main-header" data-background-color="blue">
				<!-- Logo Header -->
				@include('layouts.part.logoheader')
				<!-- End Logo Header -->
				<!-- Navbar Header -->
				@include('layouts.part.navbar')
				<!-- End Navbar -->
			
			</div>
			<!-- Sidebar -->
				@include('layouts.part.sidebar')
		@endauth
		
		<!-- End Sidebar -->
		@auth
		<div class="main-panel">
		@endauth
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">@yield('title')</h4>
					</div>
					<div class="page-category">@yield('Description')</div>
					@yield('content')
					</div>
				</div>
			</div>
			@auth
			@include('layouts.part.footer')
			@endauth
		@auth
		</div>
		@endauth
	@auth	
	</div>
	@endauth

	<!--   Core JS Files   -->
	<script src="{{ asset('js/core/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ asset('js/core/popper.min.js') }}"></script>
	<script src="{{ asset('js/core/bootstrap.min.js') }}"></script>

	<!-- jQuery UI -->	
	<script src="{{ asset('js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{ asset('js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

	<!-- Moment JS -->
	<script src="{{ asset('js/plugin/moment/moment.min.js') }}"></script>

	<!-- jQuery Sparkline -->
	<script src="{{ asset('js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>


	<!-- Dropzone -->
	<script src="{{ asset('js/plugin/dropzone/dropzone.min.js') }}"></script>


	<!-- Bootstrap Tagsinput -->
	<script src="{{ asset('js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>

	<!-- jQuery Validation -->
	<script src="{{ asset('js/plugin/jquery.validate/jquery.validate.min.js') }}"></script>

	<!-- Summernote -->
	<script src="{{ asset('js/plugin/summernote/summernote-bs4.min.js') }}"></script>

	<!-- Select2 -->
	<script src="{{ asset('js/plugin/select2/select2.full.min.js') }}"></script>

	<!-- Sweet Alert -->
	<script src="{{ asset('js/plugin/sweetalert/sweetalert.min.js') }}"></script>

	<!-- Azzara JS -->
	<script src="{{ asset('js/ready.min.js') }}"></script>

	@include('layouts.part.alert')
	
	@stack('scriptsSection')


</body>
</html>