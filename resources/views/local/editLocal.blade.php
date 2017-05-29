@extends('layouts.welcomeAdmi')
@section('contenido')
 	@include('alertas.correcto')
 	@include('alertas.request')

<div class="row">
	<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
	<h3>Editar local: {{$local->nombre}}</h3>
	
{!! Form::model($local,['method'=>'PUT','route'=>['local.update',$local->idSucursal]]) !!}
		{{Form::token()}}
		
    @include('local.localForm')
{!!Form::close()!!}
@endsection
