<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title')</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}" async>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet" async>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" async>
		@section('styles')
		@show
	</head>
	<body>
		@section('content')

		@show
	</body>
</html>