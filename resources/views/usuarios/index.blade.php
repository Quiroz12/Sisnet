@extends('layouts.welcomeAdmi')
@section('contenido')
	@include('alertas.correcto')
<div class="row">
	<div class="col-lg-8 col-md-8 col-dm-8 col-xs-12">
	<h3> Listado de Usuarios <a href="usuarios/create"><button class="btn btn-success">Nuevo</button></a></h3>
	
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">
	<div class="table-responsive">
	<table class="table table-striped table-bordered table-condensed table-hover">
	<thead>
		
		<th>Nombre</th>
		<th>Email</th>
		<th>Sucursal</th>
		<th>Opcciones</th>
	</thead>
	@foreach($users as $user)
	<tr>
		
		<td>{{$user->name}}</td>
		<td>{{$user->email}}</td>
		<td>{{$user->local->nombre}}</td>
		<td>
			<a href="{{URL::action('ControladorUsuario@edit',$user->id)}}"><button class="btn btn-info">Editar </button></a>
			<a href="" data-target="#modal-delete-{{$user->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar </button></a>

		</td>
	</tr>
		@include('usuarios.modal')
	@endforeach

	</table>
	</div>
	
	</div>	
</div>
@endsection