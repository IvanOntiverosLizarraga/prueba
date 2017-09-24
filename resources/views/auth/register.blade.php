@extends('template.main')

@section('title', 'Registrarse')

@section('content')
<div class="container">

    {!! Form::open(['url'=>'/register']) !!}

        <div class="form-group">
            {!! Form::label('name','Nombre', ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('name',null,['class'=>'form-control form-control-sm','placeholder' => 'Ej. Iván Ontiveros', 'required']) !!}
                @if ($errors->has('name'))
                        <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('address','Dirección', ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('address',null,['class'=>'form-control form-control-sm','placeholder' => 'Ej. Mazatlán, Sinaloa', 'required']) !!}
                @if ($errors->has('address'))
                        <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('user','Usuario', ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('user',null,['class'=>'form-control form-control-sm','placeholder' => 'Ej. Iván', 'required']) !!}
                @if ($errors->has('user'))
                        <span class="help-block">
                        <strong>{{ $errors->first('user') }}</strong>
                        </span>
                    @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('email','Correo', ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('email',null,['class'=>'form-control form-control-sm','placeholder' => 'Ej. ivan@correo.com', 'required']) !!}
                @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
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
            {!! Form::label('password','Confirmar contraseña', ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::password('password-confirm',['class' => 'form-control form-control-sm', 'name' => 'password_confirmation' ,'placeholder' => '**************', 'required']) !!}
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('phone','Teléfono', ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('phone',null,['class'=>'form-control form-control-sm','placeholder' => 'Ej. 6691964569', 'required']) !!}
                @if ($errors->has('phone'))
                        <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                {!! Form::submit('Registrarse',['class'=>'btn btn-primary btn-sm']) !!}
            </div>
        </div>
    {!! Form::close() !!}

</div>
@endsection
