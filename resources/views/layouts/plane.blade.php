<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>
	
	<script src="{{ asset('js/jquery.js') }}"></script>

	<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
	<link href="{{ asset('css/metisMenu.css') }}" rel="stylesheet">
	<link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
	<link href="{{ asset('css/starability-all.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
	<link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
</head>
<body>
	@yield('body')
	<script src="{{ asset('js/bootstrap.js') }}"></script>
	<script src="{{ asset('js/metisMenu.js') }}"></script>
	<script src="{{ asset('js/sb-admin-2.js') }}"></script>

	<script src="{{ asset('js/toastr.js') }}"></script>

	<script>
		@if(Session::has('message'))

		var type = "{{ Session::get('alert-type', 'info') }}";

		toastr.options = {
			"closeButton": false,
			"debug": false,
			"newestOnTop": false,
			"progressBar": false,
			"positionClass": "toast-top-right",
			"preventDuplicates": true,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "3000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		};

		switch(type) {
			case 'info':
			toastr.info("{{ Session::get('message') }}");
			break;

			case 'warning':
			toastr.warning("{{ Session::get('message') }}");
			break;

			case 'success':
			toastr.success("{{ Session::get('message') }}");
			break;

			case 'error':
			toastr.error("{{ Session::get('message') }}");
			break;
		}
		@endif
	</script>
</body>
</html>