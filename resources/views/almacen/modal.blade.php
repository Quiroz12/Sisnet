<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$almacenes->idAlmacen}}" >
{{Form::Open(array('action'=>array('ControladorAlmacen@destroy',$almacenes->idAlmacen),'method'=>'delete'))}}
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal aria-label="close>
				<span aria-hidden="true">x</span>
			</button>
			<h4 class="modal-title">Eliminar Almacen</h4>
		</div>
		<div class="modal-body">
			<p>¿Realmente desea eliminar el Almacen {{$almacenes->nombre}}?</p>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			<button type="submit" class="btn btn-primary">Confirmar</button>
		</div>
	</div>
</div>

{{Form::Close()}}
	
</div>