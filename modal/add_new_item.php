<?php 
require_once('database/Database.php');
$db = new Database();
$sql = "SELECT *
		FROM proveedores
		ORDER BY idproveedor ASC";
$prov = $db->getRows($sql);
// echo '<pre>';
// 	print_r($types);
// echo '</pre>';
 ?>
<div class="modal fade" id="modal-item">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
			
				<form class="form-horizontal" role="form" id="form-item">
				<input type="hidden" id="item-id">
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Nombre del producto:</label>
				    <div class="col-sm-9">
				      <input type="text" maxlength="50" class="form-control" id="item-name" placeholder="Ingresa el nombre generico" required="" autofocus="">
				    </div>
				  </div>
				   <div class="form-group">
				    <label class="control-label col-sm-3" for="">Costo:</label>
				    <div class="col-sm-9"> 
				      <input type="number"  step="any" class="form-control" id="item-purchase" placeholder="Ingresa costo" required="">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Precio Venta:</label>
				    <div class="col-sm-9"> 
				      <input type="number"  step="any" class="form-control" id="item-precio" placeholder="Ingresa el precio de venta" required="">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Iva:</label>
				    <div class="col-sm-9"> 
				      <input type="number"  step="any" class="form-control" id="item-iva" placeholder="Ingresa Iva" required="">
				    </div>
				  </div>

				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Código:</label>
				    <div class="col-sm-9">
				      <input type="text" maxlength="50" class="form-control" id="code" placeholder="Ingresa el código" required="" autofocus="">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Proveedor:</label>
				    <div class="col-sm-9"> 
				      <select id="item-prov" class="btn btn-default">
				      	<?php foreach($prov as $p): ?>
				      		<option value="<?= $p['idproveedor']; ?>"><?= ucwords($p['razon_social']); ?></option>
				      	<?php endforeach; ?>
				      </select>
				    </div>
				  </div>
				  <div class="form-group"> 
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" id="submit-item" value="add" class="btn btn-default">Guardar datos
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
<?php 
$db->Disconnect();
 ?>