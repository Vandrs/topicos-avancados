@extends('master')
@section('content')
<div class="row">
	<div class="col-xs-12 col-md-8 col-md-offset-2">
		<h4>Relação de avaliações e Predições</h4>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<h4>{{$user->name}}</h4>
	</div>
	<div class="col-xs-6">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th colspan="2">Filmes avaliados: {{$ratedMovies->count()}}</th>
				</tr>
				<tr>
					<th>Filme</th>
					<th>Nota</th>
				</tr>
			</thead>
			<tbody>
				@foreach($ratedMovies as $ratedMovie)
					<tr>
						<td><a href="{{route('movie',['id' => $ratedMovie->movie_id])}}">{{$ratedMovie->movie_title}}</a></td>
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
					<th colspan="2">Predições: {{count($predictions)}}</th>
				</tr>
				<tr>
					<th>Filme</th>
					<th>Nota</th>
				</tr>
			</thead>
			<tbody>
				@foreach($predictions as $prediction)
					<tr>
						<td><a href="{{route('movie',['id' => $prediction['movie']->_id])}}">{{$prediction['movie']->title}}</a></td>
						<td>{{$prediction['note']}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection