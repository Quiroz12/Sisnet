<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$prods->productos->idProducto}}" >
{{Form::Open(array('action'=>array('ControladorProducto@destroy',$prods->productos->idProducto),'method'=>'delete'))}}
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal aria-label="close>
				<span aria-hidden="true"></span>
			</button>
			<h4 class="modal-title">Eliminar Producto</h4>
		</div>
		<div class="modal-body">
			<p>¿Realmente desea eliminar el Producto {{$prods->productos->nombre}}?</p>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			<button type="submit" class="btn btn-primary">Confirmar</button>
		</div>
	</div>
</div>

{{Form::Close()}}
	
</div>