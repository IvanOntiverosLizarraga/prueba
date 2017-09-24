@extends('template.main')

@section('title')
    @if(!Auth::guest())
        Bienvenido {{ Auth::user()->name }}
    @else
        Bienvenido
    @endif

@endsection

@section('content')
@endsection
