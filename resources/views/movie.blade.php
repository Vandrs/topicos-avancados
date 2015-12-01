@extends('master')
@section('content')
<div class="row">
	<div class="col-xs-12 col-md-8 col-md-offset-2">
		<h4>Relação de avaliações do filme</h4>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 text-left">
		<h2>{{$movie->title}}({{$movie->nota()}})</h2> 
	</div>
	<div class="col-xs-12 col-md-6">
		<img class="img-responsive" src={{$movie->image_url}}/>
	</div>
	<div class="col-xs-12 col-md-6">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Usuario</th>
					<th>Nota</th>
				</tr>
			</thead>
			<tbody>
				@foreach($notes as $note)
					<tr>
						<td><a href="{{route('user',['id'=>$note->user_id])}}">{{$note->user_name}}</a></td>
						<td>{{$note->note}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection