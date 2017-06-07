@extends('layouts.welcomeAdmi')
@section('contenido')
	@include('alertas.correcto')
	<div class="row">
	<div class="col-lg-8 col-md-8 col-dm-8 col-xs-12">
	<h3> Listado de Productos <a href="productos/create"><button class="btn btn-success">Nuevo</button></a></h3>
	
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">
	<div class="table-responsive">
	<table class="table table-striped table-bordered table-condensed table-hover">
	<thead>
		<th>Imagen</th>
		<th>Nombre</th>
		<th>Descripcion</th>
		<th>Stock</th>
		<th>Precio</th>
		<th>almacen</th>
		<th>sucursal</th>
		<th>Opciones</th>
	</thead>
	@foreach($detprod as $prods)
	<tr>
		<td><img src="{{asset('img/productos/'.$prods->productos->image)}}"alt="{{$prods->productos->nombre}}",height="70px" width="70px", class="img-thumbnail"></td>
		<td>{{$prods->productos->nombre}}</td>
		<td>{{$prods->productos->descripcion}}</td>
		<td>{{$prods->stock}}</td>
		<td>{{$prods->productos->precio}}</td>
		<td>{{$prods->almacen->nombre}}</td>
		<td>{{$prods->almacen->local->nombre}}</td>
		<td>
			<a href="{{URL::action('ControladorProducto@edit',$prods->iddtAlmacen)}}"><button class="btn btn-info">Editar </button></a>
			<a href="" data-target="#modal-delete-{{$prods->iddtAlmacen}}" data-toggle="modal" data-toggle="modal"><button class="btn btn-danger">Eliminar </button></a>
		</td>

	</tr>
		
	@endforeach
	</table>
	</div>
	
	</div>	
</div>
	
@endsection
