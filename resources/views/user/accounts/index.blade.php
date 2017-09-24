@extends('template.main')

@section('title', 'Cuentas')

@section('content')

<a class="btn btn-primary" href="{{route('accounts.create')}}">Agregar una cuenta</a>

@include('flash::message')

<table class="table table-striped">
	<thead>
		<tr>
			<th>Banco</th>
			<th>Cuenta</th>
			<th>Crédito</th>
			<th>Acción</th>
		</tr>
	</thead>
	<tbody>
		@foreach($accounts as $account)
			<tr>
				<td>{{$account->bank}}</td>
				<td>{{$account->account}}</td>
				<td>${{number_format($account->credit, 2, '.', ',' )}}</td>
				<td>
					<a class="btn btn-info" href="{{route('movements.show',$account->id)}}">Ver más</a>
					<a class="btn btn-warning" href="{{route('accounts.edit',$account->id)}}" onclick="return confirm('¿Desea editar esta cuenta?')">Editar</a>
					<a class="btn btn-danger" href="{{route('accounts.destroy', $account->id)}}" onclick="return confirm('¿Desea eliminar esta cuenta?')">Eliminar</a>
				</td>
			</tr>	
		@endforeach
	</tbody>
</table>

@endsection