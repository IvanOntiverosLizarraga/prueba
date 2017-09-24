@extends('template.main')

@section('title','Editar movimiento')

@section('content')

{!! Form::open(['route'=>['movement.updte',$movement->id],'method'=>'POST']) !!}

		<div class="form-group">
            {!! Form::label('description','Descripción', ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('description',$movement->description,['class'=>'form-control form-control-sm','placeholder' => 'Ej. Depósito - Retiro', 'required']) !!}
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
                {!! Form::select('concept', ['ingreso' => 'Ingreso', 'egreso' => 'Egreso'], $movement->concept, ['class'=>'form-control form-control-sm', 'placeholder' => 'Seleccione un concepto','required']) !!}
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
                {!! Form::text('amount',$movement->amount,['class'=>'form-control form-control-sm','placeholder' => 'Ej. $2,000.00', 'required']) !!}
                @if ($errors->has('amount'))
                        <span class="help-block">
                        <strong>{{ $errors->first('amount') }}</strong>
                        </span>
                    @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                {!! Form::submit('Editar',['class'=>'btn btn-primary btn-sm']) !!}
            </div>
        </div>

	{!! Form::close() !!}
@endsection