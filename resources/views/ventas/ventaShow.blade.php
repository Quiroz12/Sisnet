@extends('layouts.welcomeAdmi')
@section('contenido')
	@foreach($detalle as $det)
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
    <h3 style="center">Detalle de la Venta N°: {{$det->ventas->idVenta}}</h3>
    </div>
@if($det->ventas->estado !='Aprovada')
	
<div class="row" style="background-color:#ebcccc">

    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <div class="form-group">
        	
            <label for ="name"> Atendio </label>
            <p>{{$det->ventas->user->name}}</p>
           
        </div>
    </div>	
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
        <div class="form-group">
            <label >Status de la Venta </label>
            <p>{{$det->ventas->estado}}</p>
        </div>	
    </div>
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
        <div class="form-group">
        	 <label >fecha y hora </label>
            <p>{{$det->ventas->fecha_hora}}</p>
           
        </div>
    </div>
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
        <div class="form-group">
             <label >Codigo de Venta </label>
            <p>{{$det->ventas->idVenta}}</p>
        </div>	
    </div> 
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
            <label >Codigo de Detalle </label>
            <p>{{$det->iddtVenta}}</p>
        </div>	
    </div>

    
</div>

<div class="row">
    <div class="panel panel-primary">
        <div class="panel-body" style="background-color:#ebcccc">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                    <thead style="background-color:#5c0605; color:#fff">
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio </th>
                    <th>Precio Venta</th>
                    <th>Subtotal</th>
                    </thead>
                    <tfoot>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><h4>Total</h4></th>
                
                    <th><h4 id="total">{{$det->ventas->totalventa}}</h4></th>
@else
<div class="row" >
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <div class="form-group">
        	
            <label for ="name"> Atendio </label>
            <p>{{$det->ventas->user->name}}</p>
           
        </div>
    </div>	
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
        <div class="form-group">
            <label >Status de la Venta </label>
            <p>{{$det->ventas->estado}}</p>
        </div>	
    </div>
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
        <div class="form-group">
        	 <label >fecha y hora </label>
            <p>{{$det->ventas->fecha_hora}}</p>
           
        </div>
    </div>
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
        <div class="form-group">
             <label >Codigo de Venta </label>
            <p>{{$det->ventas->idVenta}}</p>
        </div>	
    </div> 
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
            <label >Codigo de Detalle </label>
            <p>{{$det->iddtVenta}}</p>
        </div>	
    </div>

    
</div>

<div class="row">
    <div class="panel panel-primary">
        <div class="panel-body" >
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                    <thead style="background-color:#5c0605; color:#fff">
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio </th>
                    <th>Precio Venta</th>
                    <th>Subtotal</th>
                    </thead>
                    <tfoot>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><h4>Total</h4></th>
                
                    <th><h4 id="total">{{$det->ventas->totalventa}}</h4></th>
@endif
                    @endforeach
                    </tfoot>
                    <tbody>
                        @foreach($detalle as $det)
                        <tr>
                            <td>{{$det->productos->nombre}}</td>
                            <td>{{$det->cantidad}}</td>
                            <td>{{$det->productos->precio}}</td>
                            <td>{{$det->precio_v}}</td>
                            <td>{{$det->cantidad*$det->precio_v}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>										{!!link_to('/ventas', 'Regresar', ['class' => 'btn btn-info']) !!}		
        </div>
    </div>		
</div> 			            		




@endsection