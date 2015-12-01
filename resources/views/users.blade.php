@extends('master')
@section('content')
<div class="row">
	<div class="col-xs-12 col-md-8 col-md-offset-2">
		<h4>Relação de usuários</h4>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-8 col-md-offset-2">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th></th>
					<th>Usuário</th>
					<th>Quantidade de avaliações</th>
				</tr>
			</thead>
			<tbody>
			@foreach($users as $idx => $user)
			<tr>
				<td>{{($idx+1)}}</td>
				<td><a href="{{route('user',['id'=>$user->_id])}}">{{$user->name}}</a></td>
				<td>{{$user->qtdAvaliacoes()}}</td>
			</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection