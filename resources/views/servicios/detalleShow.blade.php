@extends('layouts.welcomeAdmi')
@section('contenido')
	@foreach($detserv as $det)

	<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
	<h3>Detalle del Servicio N°: {{$det->servicios->idServicio}}</h3>
	</div>
<div class="row" >
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <div class="form-group">
        	
            <label for ="name"> Atendio </label>
            <p>{{$det->servicios->user->name}}</p>
           
        </div>
    </div>	
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
        <div class="form-group">
            <label >Status del Servicio </label>
            <p>{{$det->servicios->estado}}</p>
        </div>	
    </div>
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
        <div class="form-group">
        	 <label >fecha y hora </label>
            <p>{{$det->servicios->fecha_hora}}</p>
           
        </div>
    </div>
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
        <div class="form-group">
             <label >Codigo de Servicio </label>
            <p>{{$det->servicios->idServicio}}</p>
        </div>	
    </div> 
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
            <label >Codigo de Detalle </label>
            <p>{{$det->iddtservicio}}</p>
        </div>	
    </div>
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
            <label >Cliente </label>
            <p>{{$det->nombreCliente}}</p>
        </div>  
    </div>
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
            <label >Telefono </label>
            <p>{{$det->telefono}}</p>
        </div>  
    </div>
    @endforeach
    

    
</div>

<div class="row">
    <div class="panel panel-primary">
        <div class="panel-body" style="">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                    <thead style="background-color:#5c0605; color:#fff">
                    <th>Equipo</th>
                    <th>N. Serie</th>
                    <th>falla </th>
                    <th>Descripcion</th>
                   
                    </thead>
                    <tfoot>
                    <th></th>
                    <th></th>
                    <th></th>
                    
                

                 
                    </tfoot>
                    <tbody>
                        @foreach($detserv as $det)
                        <tr>
                            <td>{{$det->dtequipo->equipo->nombreE}}
                             {{$det->dtequipo->marca->nombreMa}}
                              {{$det->dtequipo->modelo->nombreMo}}</td>
                            <td>{{$det->dtequipo->nserie}}</td>
                            <td>{{$det->dtequipo->falla->nombref}}</td>
                            <td>{{$det->descripcionserv}}</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>										{!!link_to('/servicios', 'Regresar', ['class' => 'btn btn-info']) !!}		
        </div>
    </div>	
            @foreach($detserv as $det)
    	 <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
            <label >Precio servicio </label>
            <p>{{$det->servicios->precio}}</p>
        </div>  
        </div>
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
            <label >Costo Pieza </label>
            <p>{{$det->costopieza}}</p>
        </div>  
        </div>
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
            <label >Adelanto </label>
            <p>{{$det->adelanto}}</p>
        </div>  
        </div>
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
            <label >Total Pendiente </label>
            <p>{{$det->subtotal_p}}</p>
        </div>  
        </div>
        @endforeach
</div> 			            		




@endsection