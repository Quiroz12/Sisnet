@extends('layouts.welcomeAdmi')
@section('contenido')
 	@include('alertas.correcto')
 	@include('alertas.request')
 	<div class="row">
	<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
	<h3>Nuevo Local</h3>
	
{!!Form::open(array('route'=>'local.store','metodo'=>'POST','autocomplete'=>'off'))!!}
		{{Form::token()}}
		
          @include('local.localForm') 
{!!Form::close()!!}
@endsection