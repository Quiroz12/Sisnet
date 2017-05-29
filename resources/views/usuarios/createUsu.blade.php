@extends('layouts.welcomeAdmi')
@section('contenido')
 	@include('alertas.correcto')
 	@include('alertas.request')
 	<div class="row">
	<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
	<h3>Nuevo Usuario</h3>
	
{!!Form::open(array('route'=>'usuarios.store','parameters'=>'$locals->idSucursal','metodo'=>'POST','autocomplete'=>'off'))!!}
		{{Form::token()}}
		
          @include('layouts.userForm')
{!!Form::close()!!}
@endsection