<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="row">	
<div class="col-lg-6 col-md-6 col-dm-12 col-xs-12">
	<div class="form-group">
			 {!!Form::label('codigo','Codigo:')!!}
			{!!Form::text('idProducto',null,['class'=>'form-control','autofocus'])!!}
		</div>
</div>
<div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
	<div class="form-group">
			 {!!Form::label('nombre','Nombre:')!!}
			{!!Form::text('nombre',null,['class'=>'form-control','autofocus'])!!}
		</div>
</div>

<div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
	<div class="form-group">
			<label>Almacen</label>
			<select name="idAlmacen" class="form-control">
				@foreach ($almacen as $alm)
				<option value="{{$alm->idAlmacen}}"> {{$alm->nombre}} </option>
				@endforeach
			</select>
		</div>
</div>
<div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
	<div class="form-group">
			{!!Form::label('stock','Stock:')!!}
			{!!Form::text('stock',null,['class'=>'form-control','autofocus'])!!}
		</div>
</div>

<div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
	<div class="form-group">
		{!!Form::label('precio','Precio:')!!}
			{!!Form::text('precio',null,['class'=>'form-control currency','autofocus'])!!}
		</div>
	</div>
<div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">
	<div class="form-group"> 
			{!!Form::label('descripcion','Descripcion:')!!}
			{{ Form::textarea('descripcion', null, ['class' => 'form-control ','cols'=>'50','rows'=>'4']) }}
			
  			
</div>
</div>

<div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">
	<div class="form-group">
			{!!Form::label('image','Imagen:')!!}
			
			{!!Form::file('image',['class'=>'form-control'])!!}
		</div>
</div>
<div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
	<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
			{!!link_to('/productos', 'Cancelar', ['class' => 'btn btn-danger']) !!}
	</div>
</div>
</div>