              <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            {!!Form::label('nombre','Nombre:',array('class' => 'col-md-4 control-label'))!!}

                            <div class="col-md-6">
                              {!!Form::text('nombre',null,['class'=>'form-control','autofocus'])!!}

                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                           <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                           {!!Form::label('direccion','Dirección:',array('class' => 'col-md-4 control-label'))!!}

                            <div class="col-md-6">
                                {!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'','autofocus'=>'autofocus'])!!}

                                @if ($errors->has('direccion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						  <div class="form-group{{ $errors->has('idfSucursal') ? ' has-error' : '' }}">
                            <label for="idfSucursal" class="col-md-4 control-label">¿A que Sucursal pertenece?</label>

                            <div class="col-md-6">

                                <select id="idfSucursal" type="text" class="form-control" name="idfSucursal" >

 @foreach($loc as $locals)  
   <option  value="{{$locals->idSucursal}}"> {{ $locals->nombre }} </option>
 @endforeach
</select>
                                @if ($errors->has('idfSucursal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('idfSucursal') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						


		<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
			{!!link_to('/almacen', 'Cancelar', ['class' => 'btn btn-danger']) !!}

		</div>
	</div>
</div>