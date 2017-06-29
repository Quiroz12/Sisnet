<div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <div class="form-group">

             {!!Form::label('name','Usuario: ')!!}
           {!!Form::text('$user->name',null,['class'=>'form-control','autofocus'])!!}
        </div>
    </div>	
 </div>
<div class="row">
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label>Producto</label>
                    <select name ="idfProducto" class="form-control selectpicker" id="idfProducto" data-live-search="true">
                        @foreach($producto as $prod)
                        <option value= "{{$prod->idProducto}}_{{$prod->stock}}_{{$prod->precio}}">{{$prod->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="form-group">
                   {!!Form::label('cantidad','Cantidad:')!!}
                    {!!Form::number('cantidad',null,['class'=>'form-control currency','autofocus'])!!}
                </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="form-group">
                   {!!Form::label('stock','Stock:')!!}
                    {!!Form::number('stock',null,['class'=>'form-control currency','autofocus','disabled'])!!}
                </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="form-group">
                      {!!Form::label('precio','Precio:')!!}
                     {!!Form::number('precio',null,['class'=>'form-control currency','autofocus','disabled'])!!}
                </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="form-group">
                    {!!Form::label('precio_v','Precio Venta:')!!}
                   {!!Form::number('precio_v',null,['class'=>'form-control currency','autofocus',''])!!}
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
                        {!!link_to('/ventas', 'Cancelar', ['class' => 'btn btn-danger']) !!}
        </div>
    </div>	
</div>


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
    $("#idfProducto").change(mostrarValores);

    function mostrarValores(){
        datosArticulo=document.getElementById('idfProducto').value.split('_');
        $("#precio").val(datosArticulo[2]);
        $("#stock").val(datosArticulo[1]);
    }
    function agregar() {
        idfProducto = $("#idfProducto").val();
        nombre = $("#idfProducto option:selected").text();
        cantidad = $("#cantidad").val();
        precio = $("#precio").val();
        precio_v = $("#precio_v").val();

        if (idfProducto != "" && cantidad != "" && cantidad > 0 && precio != "" && precio_v != ""&& precio_v>0)
        {

            subtotal[cont] = (cantidad * precio_v);
            total = total + subtotal[cont];

            var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-warning" onclick="eliminar(' + cont + ');">X</button></td><td><input type="hidden" name="idfProducto[]" value="' + idfProducto + '"/>' + nombre + '</td><td><input disabled type="number" name="cantidad[]" value="' + cantidad + '"/></td><td><input disabled type="number" name="precio[]" value="' + precio + '"/></td><td><input disabled type="number" name="precio_v[]" value="' + precio_v + '"/></td><td><input type="hidden" name="subtotal" id="subtotal" value="' + subtotal[cont] + '"/>'+ subtotal[cont] +'</td></tr>';
            cont++;
            limpiar();
            $('#total').html("$/ " + total);
            evaluar();
            $('#detalles').append(fila);

        } else
        {
            alert("Error al ingresar el detalle del ingreso, revise los datos del articulo" + idfProducto + " " + cantidad + " " + precio + " " + precio_v)
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