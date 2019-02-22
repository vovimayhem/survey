<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>
	<script src="{{ asset('js/jquery.js') }}" defer></script>
	<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
	<link href="{{ asset('css/metisMenu.css') }}" rel="stylesheet">
	<link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
	<link href="{{ asset('css/starability-all.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
	<link href="{{ asset('css/timeline.css') }}" rel="stylesheet">
</head>
<body>
	@yield('body')
	<script src="{{ asset('js/bootstrap.js') }}" defer></script>
	<script src="{{ asset('js/Chart.js') }}" defer></script>
	<script src="{{ asset('js/frontend.js') }}" defer></script>
	<script src="{{ asset('js/metisMenu.js') }}" defer></script>
	<script src="{{ asset('js/sb-admin-2.js') }}" defer></script>
</body>
</html>