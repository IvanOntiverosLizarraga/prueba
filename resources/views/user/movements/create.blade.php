@extends('template.main')

@section('title', 'Registrar Movimiento')

@section('content')

{!! Form::open(['route'=>['movement.new',$account->id],'method'=>'POST']) !!}

		<div class="form-group">
            {!! Form::label('description','Descripción', ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('description',null,['class'=>'form-control form-control-sm','placeholder' => 'Ej. Depósito - Retiro', 'required']) !!}
                @if ($errors->has('description'))
                        <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('concept','Concepto', ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::select('concept', ['ingreso' => 'Ingreso', 'egreso' => 'Egreso'], null, ['class'=>'form-control form-control-sm', 'placeholder' => 'Seleccione un concepto','required']) !!}
                @if ($errors->has('concept'))
                        <span class="help-block">
                        <strong>{{ $errors->first('concept') }}</strong>
                        </span>
                    @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('amount','Importe', ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('amount',null,['class'=>'form-control form-control-sm','placeholder' => 'Ej. $2,000.00', 'required']) !!}
                @if ($errors->has('amount'))
                        <span class="help-block">
                        <strong>{{ $errors->first('amount') }}</strong>
                        </span>
                    @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                {!! Form::submit('Registrar',['class'=>'btn btn-primary btn-sm']) !!}
            </div>
        </div>

	{!! Form::close() !!}

@endsection