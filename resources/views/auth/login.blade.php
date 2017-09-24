@extends('template.main')

@section('title', 'Ingresar')

@section('content')
<div class="container">
    
    {!! Form::open(['url'=>'/login']) !!}          

        <div class="form-group">
            {!! Form::label('user','Usuario', ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('user',null,['class'=>'form-control form-control-sm','placeholder' => 'Ej. ivan', 'required']) !!}
                @if ($errors->has('user'))
                        <span class="help-block">
                        <strong>{{ $errors->first('user') }}</strong>
                        </span>
                    @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('password','Contraseña', ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::password('password',['class'=>'form-control form-control-sm','placeholder' => '**************', 'required']) !!}
                @if ($errors->has('password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                {!! Form::submit('Ingresar',['class'=>'btn btn-primary btn-sm']) !!}
            </div>
        </div>
    {!! Form::close() !!}
              
</div>
@endsection
