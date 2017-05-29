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

                           <div class="form-group{{ $errors->has('razonSocial') ? ' has-error' : '' }}">
                           {!!Form::label('razonSocial','Razon Social:',array('class' => 'col-md-4 control-label'))!!}

                            <div class="col-md-6">
                                {!!Form::text('razonSocial',null,['class'=>'form-control','placeholder'=>'','autofocus'=>'autofocus'])!!}

                                @if ($errors->has('razonSocial'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('razonSocial') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						 <div class="form-group{{ $errors->has('rfc') ? ' has-error' : '' }}">
                             {!!Form::label('rfc','RFC:',array('class' => 'col-md-4 control-label'))!!}

                            <div class="col-md-6">
                                {!!Form::text('rfc',null,['class'=>'form-control','placeholder'=>'','autofocus'=>'autofocus'])!!}

                                @if ($errors->has('rfc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rfc') }}</strong>
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


                        <div class="form-group{{ $errors->has('ciudad') ? ' has-error' : '' }}">
                             {!!Form::label('ciudad','Ciudad:',array('class' => 'col-md-4 control-label'))!!}

                            <div class="col-md-6">
                               {!!Form::text('ciudad',null,['class'=>'form-control','placeholder'=>'','autofocus'=>'autofocus'])!!}

                                @if ($errors->has('ciudad'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ciudad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                            {!!Form::label('telefono','Telefono:',array('class' => 'col-md-4 control-label'))!!}

                            <div class="col-md-6">
                                {!!Form::text('telefono',null,['class'=>'form-control','placeholder'=>'','autofocus'=>'autofocus'])!!}

                                @if ($errors->has('telefono'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('codigoPost') ? ' has-error' : '' }}">
                            {!!Form::label('codigoPost','Codigo Postal:',array('class' => 'col-md-4 control-label'))!!}

                            <div class="col-md-6">
                               {!!Form::text('codigoPost',null,['class'=>'form-control','placeholder'=>'','autofocus'=>'autofocus'])!!}

                                @if ($errors->has('codigoPost'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('codigoPost') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



		<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
			{!!link_to('/local', 'Cancelar', ['class' => 'btn btn-danger']) !!}

		</div>
	</div>
</div>