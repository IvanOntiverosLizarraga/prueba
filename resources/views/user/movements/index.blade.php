@extends('template.main')

@section('title', 'Movimientos')

@section('content')

<a class="btn btn-primary" href="{{route('movement.select',$account->id)}}">Realizar movimiento</a>

@include('flash::message')

<table class="table table-striped">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Descripción</th>
			<th>Concepto</th>
			<th>Importe</th>
			<th>Acción</th>
		</tr>
	</thead>
	<tbody>
		@foreach($movements as $movement)
		<tr>			
			<th scope="row">{{$movement->created_at->format('Y-m-d')}}</th>
			<td>{{$movement->description}}</td>
			<td>{{$movement->concept}}</td>
			<td>${{number_format($movement->amount, 2, '.', ',' )}}</td>
			<td>
				<a class="btn btn-warning" onclick="return confirm('¿Desea editar este movimiento?')" href="{{route('movements.edit',$movement->id)}}">Editar</a>
				<a class="btn btn-danger" onclick="return confirm('¿Desea eliminar este movimiento?')" href="{{route('movements.destroy',$movement->id)}}">Eliminar</a>
			</td>
		</tr>	
		@endforeach
	</tbody>
</table>

@endsection