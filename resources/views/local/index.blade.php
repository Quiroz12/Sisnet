@extends('layouts.welcomeAdmi')
@section('contenido')
	@include('alertas.correcto')
<div class="row">
	<div class="col-lg-8 col-md-8 col-dm-8 col-xs-12">
	<h3> Listado de Locales <a href="local/create"><button class="btn btn-success">Nuevo</button></a></h3>
	
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">
	<div class="table-responsive">
	<table class="table table-striped table-bordered table-condensed table-hover">
	<thead>
		<th>Nombre</th>
		<th>RFC</th>
		<th>Direccion</th>
		<th>Opcciones</th>
	</thead>
	@foreach($local as $locales)
	<tr>
		
		<td>{{$locales->nombre}}</td>
		<td>{{$locales->rfc}}</td>
		<td>{{$locales->direccion}}</td>
		<td>
			<a href="{{URL::action('ControladorLocal@edit',$locales->idSucursal)}}"><button class="btn btn-info">Editar </button></a>
			<a href="" data-target="#modal-delete-{{$locales->idSucursal}}" data-toggle="modal" data-toggle="modal"><button class="btn btn-danger">Eliminar </button></a>
		</td>

	</tr>
		@include('local.modal')
	@endforeach
	</table>
	</div>
	
	</div>	
</div>
@endsection