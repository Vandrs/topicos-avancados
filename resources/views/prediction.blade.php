@extends('master')
@section('content')
	<div class="row">
		<div class="col-xs-12">
			<h1>Relação de Usuários e Filmes</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6">
			<h4>Usuários</h4>
			<table class="table table-bordered table-striped">
				<tbody>
					@foreach($users as $user)
					<tr>
						<td>{{$user->name}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-xs-6">
			<h4>Filmes</h4>
			<table class="table table-bordered table-striped">
				<tbody>
					@foreach($movies as $movie)
					<tr>
						<td>{{$movie->title}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<h1>Relação de avaliações e predições</h1>
		</div>
	</div>

	@foreach($users as $user)
		<div class="row">
			<div class="col-xs-12">
				<h4>{{$user->name}}</h4>
			</div>
			<div class="col-xs-6">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th colspan="2">Filmes avaliados: {{$predictionData[$user->_id]['ratedMovies']->count()}}</th>
						</tr>
						<tr>
							<th>Filme</th>
							<th>Nota</th>
						</tr>
					</thead>
					<tbody>
						@foreach($predictionData[$user->_id]['ratedMovies'] as $ratedMovie)
							<tr>
								<td>{{$ratedMovie->movie_title}}</td>
								<td>{{$ratedMovie->note}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="col-xs-6">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th colspan="2">Predições: {{count($predictionData[$user->_id]['predictions'])}}</th>
						</tr>
						<tr>
							<th>Filme</th>
							<th>Nota</th>
						</tr>
					</thead>
					<tbody>
						@foreach($predictionData[$user->_id]['predictions'] as $prediction)
							<tr>
								<td>{{$prediction['movie']->title}}</td>
								<td>{{$prediction['note']}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<hr />
			</div>
		</div>
	@endforeach

@endsection