<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="{{url('/assets/css/bootstrap.min.css')}}">
	</head>
	<body>
		<div class="container">
			@yield('content')
		</div>
		<footer>
			<script src="{{url('/assets/js/jquery-2.1.4.min.js')}}">
			</script>
			<script src="{{url('/assets/js/bootstrap.min.js')}}">
			</script>
		</footer>
	</body>
</html>