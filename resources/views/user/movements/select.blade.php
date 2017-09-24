@extends('template.main')

@section('title', 'Movimientos')

@section('content')

{!! Form::open(['route'=>'movements.store', 'method'=>'POST']) !!}

<div class="form-group">
	{!! Form::label('account','Seleccione una cuenta', ['class'=>'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::select('account', $accounts, null, ['class'=>'form-control form-control-sm', 'placeholder' => 'Seleccione una cuenta','required']) !!}
		@if ($errors->has('account'))
		<span class="help-block">
			<strong>{{ $errors->first('account') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group">
	<div class="col-md-6 col-md-offset-4">
		{!! Form::submit('Seleccionar',['class'=>'btn btn-primary btn-sm']) !!}
	</div>
</div>

{!! Form::close() !!}

@endsection