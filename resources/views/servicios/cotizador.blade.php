@extends('layouts.welcomeAdmi')
@section('contenido')
    @include('alertas.correcto')
    @include('alertas.request')
    <div class="row">
    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
    <h3>Cotizar Servicio</h3>
    </div>
</div>
{!!Form::open(array('route'=>'servicios.store','metodo'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        
          
        
        <div class="row">
    <div class="panel panel-primary">
        <div class="panel-body">
                
            <div class="row">
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"></div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label>Equipo</label>
                    <select name ="idEquipo" class="form-control " id="idEquipo" data-live-search="false" onchange="if(this.value=='Otro') {document.getElementById('otroEq').disabled = false} else {document.getElementById('otroEq').disabled = true} ">
                        <option  value="">Seleccione un Equipo</option> 
                        @foreach($equipo as $eq)

                              <option  value= "{{$eq->idEquipo}}">{{$eq->nombreE}}</option>
                                                      
                      
                        @endforeach
                         <option value="Otro" >Otro</option>
                          
                    </select>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"></div>
               <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group ">
                    <label>Marca</label>
                    <select name ="idMarca" class="form-control " id="idMarca" data-live-search="false" onchange="if(this.value=='Otro') {document.getElementById('otroMa').disabled = false} else {document.getElementById('otroMa').disabled = true} ">
                        
                       <option value="" >Selecciona una Marca</option>
                         <option value="Otro" >Otro</option>
                         
                    </select>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"></div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group ">
                    <label>Modelo</label>
                    <select name ="idModelo" class="form-control " id="idModelo" data-live-search="false" onchange="if(this.value=='Otro') {document.getElementById('otroMo').disabled = false} else {document.getElementById('otroMo').disabled = true} ">
                        <option  value="">Seleccione un Modelo</option> 
                      
                         <option value="Otro" >Otro</option>
                         
                    </select>
                </div>
                </div>
            </div>
               

                
                 
                <div class="row">
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"></div>
               <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group ">
                    <label>Falla</label>
                    <select name ="idFalla" class="form-control " id="idFalla" data-live-search="false" onchange="if(this.value=='Otro') {document.getElementById('Ofalla').disabled = false} else {document.getElementById('Ofalla').disabled = true} ">
                        <option  value="">Seleccione su falla</option> 
                        

                              <option  value= ""></option>
                                                      
                      
                        
                         <option value="Otro" >Otro</option>
                          
                    </select>
                </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"></div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group ">
                    <label>Precio Aproximado</label>
                    <h4 id="precio" name="precio">$</h4>
                    
                </div>
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
                          $("#idFalla").empty();
                        $("#idMarca").append('<option>Selecciona una Marca</option>');
                        $("#idModelo").append('<option>Selecciona un Modelo</option>');
                          $("#idFalla").append('<option>Selecciona una Falla</option>');
                        $.each(res, function (key, value) {
                            $("#idMarca").append('<option value="' + key + '">' + value + '</option>');
                        }
                        );
                        

                    } else {
                        $("#idMarca").empty();
                    }
                }
            });
        } else {
            $("#idMarca").empty();
            $("#idModelo").empty();
            $("#idFalla").empty();
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
                        $("#idFalla").empty();
                        $("#idModelo").append('<option>Selecciona un Modelo</option>');
                         $("#idFalla").append('<option>Selecciona una Falla</option>');
                        $.each(res, function (key, value) {
                            $("#idModelo").append('<option value="' + key + '">' + value + '</option>');
                        });
                          

                    } else {
                        $("#idModelo").empty();
                    }
                }
            });
        } else {
            $("#idModelo").empty();
            $("#idFalla").empty();
        }
    });
 $('#idModelo').on('change', function () {
        var modeloID = $(this).val();
        if (modeloID) {
            $.ajax({
                type: "GET",
                url: "{{url('get-falla-list')}}?idModelo=" + modeloID,
                success: function (res) {
                    if (res) {
                        $("#idFalla").empty();
                        $("#idFalla").append('<option>Selecciona una Falla</option>');
                        $.each(res, function (key, value) {
                            $("#idFalla").append('<option value="' + key + '">' + value + '</option>');
                        });
                         

                    } else {
                        $("#idFalla").empty();
                    }
                }
            });
        } else {
            $("#idFalla").empty();
        }
    });
  $('#idFalla').on('change', function () {
        var fallaID = $(this).val();
        if (fallaID) {
            $.ajax({
                type: "GET",
                url: "{{url('get-costo-list')}}?idFalla=" + fallaID,
                success: function (res) {
                    if (res) {
                        $("#precio").empty();
                        
                        $.each(res, function (key, value) {
                            $("#precio").append('<h4 value="' + key + '">$ ' + value + '</h4>');
                        });
                         

                    } else {
                        $("#precio").empty();
                    }
                }
            });
        } else {
            $("#precio").empty();
        }
    });
//--------------------------------------------

      

    
</script> 
@endpush
@endsection