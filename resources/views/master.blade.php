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
			<script type="text/javascript">
				var INSERT_MOVIES_ROUTE = "{{route("movies.insert")}}";
				var TOKEN = "{{csrf_token()}}";
			</script>
			<script src="{{url('/assets/js/jquery-2.1.4.min.js')}}" type="text/javascript">
			</script>
			<script src="{{url('/assets/js/bootstrap.min.js')}}" type="text/javascript">
			</script>
			@if(isset($scripts) &&!empty($scripts))
				@foreach($scripts as $script)
				<script src="{{url('/assets/js/'.$script)}}" type="text/javascript"></script>
				@endforeach
			@endif
		</footer>
	</body>
</html>