@extends('layouts.welcomeAdmi')
@section('contenido')
 	@include('alertas.correcto')
 	@include('alertas.request')

<div class="row">
	<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
	<h3>Editar Almacen: {{$almacen->nombre}}</h3>
	
{!! Form::model($almacen,['method'=>'PUT','route'=>['almacen.update',$almacen->idAlmacen]]) !!}
		{{Form::token()}}
		
    @include('almacen.almacenForm')
{!!Form::close()!!}
</div>
</div>
@endsection
