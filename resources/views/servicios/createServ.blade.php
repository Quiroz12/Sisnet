@extends('layouts.welcomeAdmi')
@section('contenido')
    @include('alertas.correcto')
    @include('alertas.request')
    <div class="row">
    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
    <h3>Nuevo Servicio</h3>
    </div>
</div>
{!!Form::open(array('route'=>'servicios.store','metodo'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        
          <div class="row">
          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">

             {!!Form::label('name','Usuario: ')!!}
           {{ Auth::user()->name }}
              <input type="hidden" name="id" id="id" class="form-control" value="{{ Auth::user()->id }}"  >

            </div>
        </div>  
        </div>
        
        <div class="row">
    <div class="panel panel-primary">
        <div class="panel-body">
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                {!!Form::label('nombreCliente','Nombre Cliente')!!}
            {!!Form::text('nombreCliente',null,['class'=>'form-control currency','autofocus','placeholder'=>'Nombre C.'])!!}
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                    {!!Form::label('telefono','Telefono')!!}
            {!!Form::tel('telefono',null,['class'=>'form-control currency','autofocus','placeholder'=>'telefono'])!!}
                </div>
            </div>
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                    <label>Equipo</label>
                    <select name ="idEquipo" class="form-control " id="idEquipo" data-live-search="false" onchange="if(this.value=='Otro') {document.getElementById('otroEq').disabled = false} else {document.getElementById('otroEq').disabled = true} ">
                        <option  value="">Seleccione un Equipo</option> 
                        @foreach($equipo as $eq)

                              <option  value= "{{$eq->idEquipo}}">{{$eq->nombreE}}</option>
                                                      
                      
                        @endforeach
                         <option value="Otro" >Otro</option>
                          <input type="text" name="otroEq" id="otroEq" class="form-control" placeholder="Equipo" disabled>
                    </select>
                </div>
                </div>
               <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group ">
                    <label>Marca</label>
                    <select name ="idMarca" class="form-control " id="idMarca" data-live-search="false" onchange="if(this.value=='Otro') {document.getElementById('otroMa').disabled = false} else {document.getElementById('otroMa').disabled = true} ">
                        
                       <option value="" >Selecciona una Marca</option>
                         <option value="Otro" >Otro</option>
                          <input type="text" name="otroMa" id="otroMa" class="form-control" placeholder="Modelo" disabled>
                    </select>
                </div>
                </div>

                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group ">
                    <label>Modelo</label>
                    <select name ="idModelo" class="form-control " id="idModelo" data-live-search="false" onchange="if(this.value=='Otro') {document.getElementById('otroMo').disabled = false} else {document.getElementById('otroMo').disabled = true} ">
                        <option  value="">Seleccione un Modelo</option> 
                      
                         <option value="Otro" >Otro</option>
                          <input type="text" name="otroMo" id="otroMo" class="form-control" placeholder="Modelo" disabled>
                    </select>
                </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                {!!Form::label('nserie','Numero de Serie')!!}
                {!!Form::text('nserie',null,['class'=>'form-control currency','autofocus','placeholder'=>'N. Serie'])!!}
                </div>
                </div> 

                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                     {!!Form::label('informacionAdd','Informacion Adicional')!!}
                     {{ Form::textarea('informacionAdd', null, ['class' => 'form-control ','cols'=>'30','rows'=>'2']) }}
                </div>
                </div>
                 <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                     {!!Form::label('condicionEntrada','Condicion de Entrada')!!}
                     {{ Form::textarea('condicionEntrada', null, ['class' => 'form-control ','cols'=>'30','rows'=>'2']) }}
                </div>
                </div>
                <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
               <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group ">
                    <label>Falla</label>
                    <select name ="idFalla" class="form-control " id="idFalla" data-live-search="false" onchange="if(this.value=='Otro') {document.getElementById('Ofalla').disabled = false} else {document.getElementById('Ofalla').disabled = true} ">
                        <option  value="">Seleccione su falla</option> 
                        @foreach($falla as $f)

                              <option  value= "{{$f->idFalla}}">{{$f->nombref}}</option>
                                                      
                      
                        @endforeach
                         <option value="Otro" >Otro</option>
                          <input type="text" name="Ofalla" id="Ofalla" class="form-control" placeholder="Falla" disabled>
                    </select>
                </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                     {!!Form::label('descripcionfalla','Descripcion de la falla')!!}
                     {{ Form::textarea('descripcionfalla', null, ['class' => 'form-control ','cols'=>'30','rows'=>'2']) }}
                </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                     {!!Form::label('precio',' Precio')!!}
                     {{ Form::number('precio', null, ['class' => 'form-control ',]) }}
                </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                     {!!Form::label('adelanto',' Anticipo')!!}
                     {{ Form::number('adelanto', null, ['class' => 'form-control ',]) }}
                     
                </div>
                </div>

            </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <h4 id="subtotal">$/. 0.00</h4>
                 <input type="hidden" id="total" name="total" value="{{ old('total') }}"> 
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
    
$('#idEquipo').change(function () {
        var equipoID = $(this).val();
        if (equipoID) {
            $.ajax({
                type: "GET",
                url: "{{url('get-marca-list')}}?idEquipo=" + equipoID,
                beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
                success: function (res) {
                    if (res) {
                        $("#idMarca").empty();
                        $("#idModelo").empty();
                        $("#idMarca").append('<option>Selecciona una Marca</option>');
                        $("#idModelo").append('<option>Selecciona un Modelo</option>');
                        $.each(res, function (key, value) {
                            $("#idMarca").append('<option value="' + key + '">' + value + '</option>');
                        }
                        );
                        $("#idMarca").append('<option value="Otro">Otro</option>');
                         $("#idModelo").append('<option value="Otro">Otro</option>');

                    } else {
                        $("#idMarca").empty();
                    }
                }
            });
        } else {
            $("#idMarca").empty();
            $("#idModelo").empty();
        }
    });
 $('#idMarca').on('change', function () {
        var marcaID = $(this).val();
        if (marcaID) {
            $.ajax({
                type: "GET",
                url: "{{url('get-modelo-list')}}?idMarca=" + marcaID,
                success: function (res) {
                    if (res) {
                        $("#idModelo").empty();
                        $("#idModelo").append('<option>Selecciona un Modelo</option>');
                        $.each(res, function (key, value) {
                            $("#idModelo").append('<option value="' + key + '">' + value + '</option>');
                        });
                          $("#idModelo").append('<option value="Otro">Otro</option>');

                    } else {
                        $("#idModelo").empty();
                    }
                }
            });
        } else {
            $("#idModelo").empty();
        }
    });
//--------------------------------------------
$("#adelanto").change(restar);
$("#precio").change(restar);
   function restar () {
    var subtotal = 0;
    
    precio = $("#precio").val();
   adelanto = $("#adelanto").val(); 

   subtotal= precio-adelanto;
   total=subtotal;
    $('#total').val(total);
   $('#subtotal').html("Pendiente de cobrar: $/ " + subtotal);
      

            
}
</script> 
@endpush
@endsection