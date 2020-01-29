<!DOCTYPE html>
<html lang="en">
<head>

	@yield('meta')

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/navbar.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/login.css?v=1.1')}}">
</head>
<body>

	@include('includes.landing_header')

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-25">
				@yield('content')
			</div>
		</div>
	</div>

	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets/js/popper.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/js/login.js')}}"></script>

</body>
</html>
