@extends('layouts.welcomeAdmi')
@section('contenido')
@foreach($detserv as $det)

	<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
	<h3>Cobrar Servicio N°: {{$det->servicios->idServicio}}</h3>
	</div>
<div class="row" >
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
     
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
 <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
            <h4 >Precio del Servicio  </h4>
            <h4>{{$det->servicios->precio}}</h4>
          
        </div>
    </div>
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
            <h4 > Pendiente </h4>
            <h4>{{$det->subtotal_p}}</h4>
           <input type="hidden" id="pendiente" name="pendiente" value="{{$det->subtotal_p}}">
        </div>  
        </div>

    @endforeach

    {!! Form::model($det,['method'=>'PUT','route'=>['servicios.update',$det->servicios->idServicio]]) !!}
		{{Form::token()}}

		<div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                <div class="form-group">
		 {!!Form::label('recibo','Recibo')!!}
                {!!Form::number('recibo',null,['class'=>'form-control ',])!!}
	   </div>
	   </div>
	   <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                <div class="form-group">
		 {!!Form::label('costopieza','Costo de pieza')!!}
                {!!Form::number('costopieza',null,['class'=>'form-control ',])!!}
	   </div>
	   </div>
	   <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                <div class="form-group">
		  <h4 id="cambio">$/. 0.00</h4>
	   </div>
	   </div>
 </div>
  </div>
	   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 " id="guardar">
        <div class="form-group">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/> 
            <button class="btn btn-primary" type="submit">Cobrar</button>
                    {!!link_to('/servicios', 'Cancelar', ['class' => 'btn btn-danger']) !!}
        </div>
    </div>  
{!!Form::close()!!}
@push('scripts')
<script>
$("#recibo").change(restar);
   function restar () {
    var subtotal = 0;
    
    pendiente = $("#pendiente").val();
   recibo = $("#recibo").val(); 

   subtotal= recibo-pendiente;
   total=subtotal;
    $('#cambio').val(total);
   $('#cambio').html("cambio: $/ " + subtotal);
      

            
}	
</script>
@endpush
@endsection