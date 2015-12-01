@extends('master')
@section('content')
<div class="row">
	<div class="col-xs-12 col-md-8 col-md-offset-2">
		<h4>Relação de filmes</h4>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-8 col-md-offset-2">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th></th>
					<th class="img-holder">Poster</th>
					<th>Título</th>
					<th>Quantidade de avaliações</th>
					<th>Nota</th>
				</tr>
			</thead>
			<tbody>
			@foreach($movies as $idx => $movie)
			<tr>
				<td>{{($idx+1)}}</td>
				<td class="img-holder"><img class="img-responsive" src="{{$movie->image_url}}"/></td>
				<td><a href="{{route('movie',['id'=>$movie->_id])}}">{{$movie->title}}</a></td>
				<td>{{$movie->qtdAvaliacoes()}}</td>
				<td>{{$movie->nota()}}</td>
			</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection