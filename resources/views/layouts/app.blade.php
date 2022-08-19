<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title')</title>

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	@stack('prepend-style')
	@include('includes.style')
	@stack('addon-style')
</head>

<body>
	{{-- Navbar --}}
	@include('includes.navbar')

	{{-- Page Content --}}
	@yield('content')
	
	{{-- Footer --}}
	@include('includes.footer')
	
	{{-- Script --}}
	@stack('prepend-script')
	@include('includes.script')
	@stack('addon-script')
</body>
</html>
