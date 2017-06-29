              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						 <div class="form-group{{ $errors->has('celular') ? ' has-error' : '' }}">
                            <label for="celular" class="col-md-4 control-label">Celular</label>

                            <div class="col-md-6">
                                <input id="celular" type="phone" class="form-control" name="celular" value="{{ old('celular') }}" required >


                                @if ($errors->has('celular'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('celular') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						<div class="form-group{{ $errors->has('rol') ? ' has-error' : '' }}">
                            <label for="rol" class="col-md-4 control-label">Perfil</label>

                            <div class="col-md-6">

                                <select id="rol" type="text" class="form-control" name="rol"  required autofocus>
									<option value="admi">Administrador</option>
									<option value="tecnico">Tecnico</option>
									<option value="encargado">Encargado</option>
									<select>
                                @if ($errors->has('rol'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rol') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('idSucursal') ? ' has-error' : '' }}">
                            <label for="idSucursal" class="col-md-4 control-label">Sucursal</label>

                            <div class="col-md-6">

                                <select id="idSucursal" type="text" class="form-control" name="idSucursal" >

 @foreach($loc as $locals)  
   <option  value="{{$locals->idSucursal}}"> {{ $locals->nombre }} </option>
 @endforeach
</select>
                                @if ($errors->has('idSucursal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('idSucursal') }} El usuario debe pertenecer a una Sucursal, Agregue primero una Sucursal</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('turno') ? ' has-error' : '' }} ">
                            <label for="turno" class="col-md-4 control-label">Turno</label>

                            <div class="col-md-6">

                                <select id="turno" type="text" class="form-control" name="turno"  required autofocus>
									<option value="de 9:30 a 8:00">de 9:30 a 8:00</option>
									<option value="de 9:30 a 3:00">de 9:30 a 3:00</option>
									<option value="de 3:00 a 8:00">de 3:00 a 8:00</option>
									<select>
                                @if ($errors->has('turno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('turno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
			{!!link_to('/usuarios', 'Cancelar', ['class' => 'btn btn-danger']) !!}
		</div>
	</div>
</div>