<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>demo view laravel</title>
	<link rel="stylesheet" href="{{ asset('css/demo/bootstrap.min.css') }}">
</head>
<body>
	<div class="container">
		@include('common.header')
		@include('common.menu')
		
		@yield('content')

		@include('common.footer')
		
	</div>
</body>
</html>