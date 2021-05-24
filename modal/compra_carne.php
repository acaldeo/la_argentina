<div class="modal fade" id="modal-compraCarne">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
			
				<form class="form-horizontal" role="form" id="form-compra">
				<input type="hidden" id="proveedor">	
				<input type="hidden" id="stock-id">
				<input type="hidden" id="item-id">
				<input type="hidden" id="item-code">

				<div class="form-group">
				    <label class="control-label col-sm-3" for="">Cantidad:</label>
				    <div class="col-sm-9"> 
				      <input type="number" step="any" class="form-control" id="compra-cantidad" placeholder="Ingresa cantidad" required="">
				    </div>
				  </div>
				   <div class="form-group">
				    <label class="control-label col-sm-3" for="">Costo:</label>
				    <div class="col-sm-9"> 
				      <input type="number" step="any" class="form-control" id="compra-costo" placeholder="Ingresa costo" required="">
				    </div>
				  </div>
				  <div class="form-group"> 
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" id="submit-compra" value="add" class="btn btn-default">Ingresar!
				      <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
				      </button>
				    </div>
				  </div>
				</form>
				
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
