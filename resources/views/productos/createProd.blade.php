@extends('layouts.welcomeAdmi')
@section('contenido')
@include('alertas.correcto')
 @include('alertas.request')

		{!!Form::open(array('route'=>'productos.store','parameters'=>'$alm->idAlmacen','metodo'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
		{{Form::token()}}
		@include('productos.prodForm')
{!!Form::close()!!}  

@endsection
