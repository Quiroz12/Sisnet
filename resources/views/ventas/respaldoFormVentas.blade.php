@extends('layouts.welcomeAdmi')
@section('contenido')
	@include('alertas.correcto')
        <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h2 >Nueva Venta</h2>
            <h3>Ingrese los datos solicitados</h3>

           
        </div>
        </div>

             {!!Form::open(array('route'=>'ventas.store','metodo'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
        
           <div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <div class="form-group">

             {!!Form::label('name','Usuario: ')!!}
           {!!Form::text('name',null,['class'=>'form-control','autofocus'])!!}
        </div>
    </div>  
 </div>
<div class="row">
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label>Producto</label>
                    <select name ="idProducto" class="form-control selectpicker" id="idProducto" data-live-search="true">
                        @foreach($producto as $prod)
                        <option value= "{{$prod->idProducto}}_{{$prod->stock}}_{{$prod->precio}}">{{$prod->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="form-group">
                <label for="Cantidad">Cantidad</label>
                    <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="Cantidad">
                </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="form-group">
                   <label for="stock">Stock</label>
                    <input type="number" name="stock" id="stock" class="form-control" placeholder="Stock" disabled>
                </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="form-group">
                      <label for="precio">Precio </label>
                    <input type="number" name="precio" id="precio" class="form-control" placeholder="Precio" disabled>
                </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="form-group">
                  <label for="precio_v">Precio Venta</label>
                    <input type="number" name="precio_v" id="precio_v" class="form-control" placeholder="P. Venta" >
                </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="form-group">
                    <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                </div>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                    <thead style="background-color:#5c0605; color:#fff">
                    <th>Opciones</th>
                    <th>Articulo</th>
                    <th>Cantidad</th>
                    <th>Precio </th>
                    <th>Precio Venta</th>
                    <th>Subtotal</th><input type="hidden" name="subtotal" id="subtotal"/>
                    </thead>
                    <tfoot>
                    <th>TOTAL</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><h4 id="total">Q/. 0.00</h4><input type="hidden" name="totalventa" id="totalventa"/> </th>
                    </tfoot>
                    <tbody>
                    </tbody>
                </table>
            </div>                                              
        </div>
    </div>  
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 " id="guardar">
        <div class="form-group">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/> 
            <button class="btn btn-primary" type="submit">Cobrar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
    </div>  
</div>


            {!!Form::close()!!}


@push('scripts')
<script>
    $(document).ready(function () {
        $('#bt_add').click(function () {
            agregar();
        });
    });

    var cont = 0;
    total = 0;
    subtotal = [];
    $("#guardar").hide();
    $("#idProducto").change(mostrarValores);

    function mostrarValores(){
        datosArticulo=document.getElementById('idProducto').value.split('_');
       $("#stock").val(datosArticulo[1]);
        $("#precio").val(datosArticulo[2]);
        
    }
    function agregar() {

        datosArticulo=document.getElementById('idProducto').value.split('_');
        idfProducto = datosArticulo[0];
        nombre = $("#idProducto option:selected").text();
        cantidad = $("#cantidad").val();
        precio = $("#precio").val();
        precio_v = $("#precio_v").val();
        stock = $("#stock").val();

        if (idfProducto != "" && cantidad != "" && cantidad > 0 && precio != "" && precio_v != ""&& precio_v>0)
        {
            if(stock>=cantidad){

            subtotal[cont] = (cantidad * precio_v);
            total = total + subtotal[cont];

            var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-warning" onclick="eliminar(' + cont + ');">X</button></td><td><input type="hidden" name="idProducto[]" value="' + idfProducto + '">' + nombre + '</td><td><input type="number" name="cantidad[]" value="' + cantidad + '"></td><td><input type="number" name="precio[]" value="' + precio + '"></td><td><input type="number" name="precio_v[]" value="' + precio_v + '"></td><td>' + subtotal[cont] + '</td><td><input type="hidden" name="subtotal[]" value="' + subtotal[cont] + '"></td></tr>';
            cont++;
            limpiar();
            $('#total').html("$/ " + total);
             $('#totalventa').val(total);
            evaluar();
            $('#detalles').append(fila);
            }
             else
                {alert("la cantidad a vender supera el stock" + idfProducto + " " + cantidad + " " + precio + " " + precio_v+" " + stock);}


        }
         else
        {
            alert("Error al ingresar el detalle del venta, revise los datos del articulo" + idfProducto + " " + cantidad + " " + precio + " " + precio_v+" " + stock);
        }

    }
    function limpiar() {
        $("#cantidad").val("");
        $("#precio").val("");
        $("#precio_v").val("");
    }

    function evaluar()
    {
        if (total > 0)
        {
            $("#guardar").show();
        } else
        {
            $("#guardar").hide();
        }
    }

    function eliminar(index) {
        total = total - subtotal[index];
        $("#total").html("S/. " + total);
        $("#fila" + index).remove();
        evaluar();

    }
</script>
@endpush                                

@endsection
