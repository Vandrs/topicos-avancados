<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="{{url('/assets/css/bootstrap.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{url('/assets/css/style.css')}}">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 text-center">
					<h1>Tópicos Avançados<br />Algoritmos de recomendação e MongoDB</h1>
					<br />
					<br />
				</div>
				<div class="col-xs-12 col-md-8 col-md-offset-2 text-right">
					<a class="btn btn-primary" href="{{route('users')}}"><icon class="glyphicon glyphicon-user"></icon>&nbsp;Usuarios</a>
					<a class="btn btn-danger" href="{{route('movies')}}"><icon class="glyphicon glyphicon-facetime-video"></icon>&nbsp;Filmes</a>
				</div>
			</div>
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