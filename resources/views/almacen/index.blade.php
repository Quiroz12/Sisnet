@extends('layouts.welcomeAdmi')
@section('contenido')
	@include('alertas.correcto')
<div class="row">
	<div class="col-lg-8 col-md-8 col-dm-8 col-xs-12">
	<h3> Listado de Almacenes <a href="almacen/create"><button class="btn btn-success">Nuevo</button></a></h3>
	
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">
	<div class="table-responsive">
	<table class="table table-striped table-bordered table-condensed table-hover">
	<thead>
		<th>Nombre</th>
		<th>Dirección</th>
		<th>Sucursal</th>
		<th>Opcciones</th>
	</thead>
	@foreach($almacen as $almacenes)
	<tr>
		
		<td>{{$almacenes->nombre}}</td>
		<td>{{$almacenes->direccion}}</td>
		<td>{{$almacenes->local->nombre}}</td>
		<td>
			<a href="{{URL::action('ControladorAlmacen@edit',$almacenes->idAlmacen)}}"><button class="btn btn-info">Editar </button></a>
			<a href="" data-target="#modal-delete-{{$almacenes->idAlmacen}}" data-toggle="modal" data-toggle="modal"><button class="btn btn-danger">Eliminar </button></a>
		</td>

	</tr>
		@include('almacen.modal')
	@endforeach
	</table>
	</div>
	
	</div>	
</div>
	
@endsection	