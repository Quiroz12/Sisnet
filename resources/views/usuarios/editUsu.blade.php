@extends('layouts.welcomeAdmi')
@section('contenido')
	@include('alertas.correcto')
 	@include('alertas.request')
 	<div class="row">
	<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
	<h3>Editar Usuario: {{$usuario->name}}</h3>
	
{!! Form::model($usuario,['method'=>'PUT','route'=>['usuarios.update',$usuario->id]]) !!}
		{{Form::token()}}
		
    @include('layouts.userForm')
{!!Form::close()!!}


 	@endsection