@extends('template.main')

@section('title','Registrar cuenta')

@section('content')

	{!! Form::open(['route'=>'accounts.store','method'=>'POST']) !!}

		<div class="form-group">
            {!! Form::label('bank','Banco', ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('bank',null,['class'=>'form-control form-control-sm','placeholder' => 'Ej. Bancomer', 'required']) !!}
                @if ($errors->has('bank'))
                        <span class="help-block">
                        <strong>{{ $errors->first('bank') }}</strong>
                        </span>
                    @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('account','Cuenta', ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('account',null,['class'=>'form-control form-control-sm','placeholder' => 'Ej. 9876543217', 'required']) !!}
                @if ($errors->has('account'))
                        <span class="help-block">
                        <strong>{{ $errors->first('account') }}</strong>
                        </span>
                    @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('credit','Crédito', ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('credit',null,['class'=>'form-control form-control-sm','placeholder' => 'Ej. $20,000.00', 'required']) !!}
                @if ($errors->has('credit'))
                        <span class="help-block">
                        <strong>{{ $errors->first('credit') }}</strong>
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