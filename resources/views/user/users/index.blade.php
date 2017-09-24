@extends('template.main')

@section('title', 'Mi perfil')

@section('content')

<a class="btn btn-danger" onclick="return confirm('¿Desea eliminar su usuario?')" href="{{route('myprofile.destroy',$userId)}}">Eliminar mi usuario</a>

@include('flash::message')

<table class="table table-striped">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Dirección</th>
			<th>Usuario</th>
			<th>Correo</th>
			<th>Teléfono</th>
		</tr>
	</thead>
	<tbody>
		@foreach($user as $i)
		<tr>
			<th>{{$i->name}}</th>
			<th>{{$i->address}}</th>
			<th>{{$i->user}}</th>
			<th>{{$i->email}}</th>
			<th>{{$i->phone}}</th>
		</tr>	
		@endforeach
	</tbody>
</table>

@endsection