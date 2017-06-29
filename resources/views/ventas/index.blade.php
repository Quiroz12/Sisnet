@extends('layouts.welcomeAdmi')
@section('contenido')
	@include('alertas.correcto')

	<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Ventas <a href="ventas/create"><button class="btn btn-success">Nuevo </button></a></h3>
        
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <th>Codigo Venta</th>
                <th>Atendio</th>
                <th>Fecha</th>
                <th>Total</th>
<!-- 					<th>Serie Comprobante</th>
                <th>Numero Comprobante</th> -->
                <th>Estado Venta</th>
            
                <th>Opciones</th>
                </thead>
                @foreach ($dtventas as $ven)
                <tr>
                	@if($ven->estado !='Aprovada')
                	<td class="danger">{{$ven->idVenta}}</td>
                    <td class="danger">{{$ven->user->name}}</td>
                    <td class="danger">{{$ven->fecha_hora}}</td>
                    <td class="danger">{{$ven->totalventa}}</td>
                    <td class="danger">{{$ven->estado}}</td>
                     <td>
                        <a href="{{URL::action('ControladorVenta@show',$ven->idVenta)}}"><button class="btn btn-info btn-sm"> Detalles</button></a>
                       
                    </td>
                   @else
                   <td>{{$ven->idVenta}}</td>
                   <td>{{$ven->user->name}}</td>
                    <td>{{$ven->fecha_hora}}</td>
                    <td>{{$ven->totalventa}}</td>
                    <td>{{$ven->estado}}</td>
                    <td>
                        <a href="{{URL::action('ControladorVenta@show',$ven->idVenta)}}"><button class="btn btn-info btn-sm"> Detalles</button></a>
                        <a href="" data-target="#modal-delete-{{$ven->idVenta}}" data-toggle="modal"><button class="btn btn-danger btn-sm">Anular Venta</button></a>
                    </td>
                    @endif
                    
                </tr>
               @include('ventas.cancelModal')
                @endforeach
            </table>
        </div>
    
    </div>
</div>

@endsection
