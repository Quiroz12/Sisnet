@extends('layouts.welcomeAdmi')
@section('contenido')
	@include('alertas.correcto')

	<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Servicios <a href="servicios/create"><button class="btn btn-success">Nuevo </button></a></h3>
        
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <th>Codigo Servicio</th>
                <th>Fecha</th>
                <th>Precio</th>
<!-- 					<th>Serie Comprobante</th>
                <th>Numero Comprobante</th> -->
                <th>Estado Servicio</th>
            
                <th>Opciones</th>
                </thead>
                @foreach ($serv as $s)
               
                <tr>
                 @if($s->estado=="Aprovado")
                   <td class="warning">{{$s->idServicio}}</td class="warning">
                    <td class="warning">{{$s->fecha_hora}}</td>
                    <td class="warning">{{$s->precio}}</td>
                    <td class="warning">{{$s->estado}}</td>

                    <td>
                        <a href="{{URL::action('ControladorServicio@show',$s->idServicio)}}"><button class="btn btn-info btn-xs"> Detalles</button></a>
                        <a href="" data-target="#modal-delete-{{$s->idServicio}}" data-toggle="modal"><button class="btn btn-danger btn-xs">Anular Servicio</button></a>
                        <a href="{{URL::action('ControladorServicio@edit',$s->idServicio)}}"><button class="btn btn-success btn-xs"> Cobrar</button></a>
                    </td>
                @endif
            
                  @if($s->estado=="Cobrado")
                   <td class="success">{{$s->idServicio}}</td class="success">
                    <td class="success">{{$s->fecha_hora}}</td>
                    <td class="success">{{$s->precio}}</td>
                    <td class="success">{{$s->estado}}</td>
                     <td>
                        <a href="{{URL::action('ControladorServicio@show',$s->idServicio)}}"><button class="btn btn-info btn-xs"> Detalles</button></a>
                        <a href="" data-target="#modal-delete-{{$s->idServicio}}" data-toggle="modal"><button class="btn btn-danger btn-xs">Anular Servicio</button></a>
                    </td>
                    @endif
                   @if($s->estado=="Cancelado")
                    <td class="danger">{{$s->idServicio}}</td class="success">
                    <td class="danger">{{$s->fecha_hora}}</td>
                    <td class="danger">{{$s->precio}}</td>
                    <td class="danger">{{$s->estado}}</td>
                    <td>
                        <a href="{{URL::action('ControladorServicio@show',$s->idServicio)}}"><button class="btn btn-info btn-xs"> Detalles</button></a>
                        
                    </td>
                   @endif
                @include('servicios.cancelModal')
                </tr>
              
                @endforeach
            </table>
        </div>
    
    </div>
</div>

@endsection
