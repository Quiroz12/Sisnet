@extends('layouts.welcomeAdmi')
@section('contenido')
 	@include('alertas.correcto')
 	@include('alertas.request')

<h3>Editar producto: {{$detalm->nombre}}</h3>
{!! Form::model($detalm,['method'=>'PUT','route'=>['productos.update',$detalm->productos->idProducto]]) !!}
		{{Form::token()}}
		
    @include('productos.prodForm')
{!!Form::close()!!}

@endsection
