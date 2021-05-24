<?php 
/*************************/
//Mostrar errores php
///*************************/
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
///*************************/
	require_once('database/Database.php');
	$db = new Database();
	//get all items
	$sqlPr = "SELECT *
			FROM item where item_price = 0 
			ORDER BY item_id ASC";
	$item = $db->getRows($sqlPr);
	$sqlPv = "SELECT *
			FROM proveedores 
			ORDER BY idproveedor ASC";
	$prov = $db->getRows($sqlPv);
 ?>
<div class="modal fade" id="modal-stock-carne">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				<!-- FORM -->
				<form class="form-horizontal" role="form" id="form-stock-carne">
					<input class="form-control" type="hidden" name="stock-id" id="stock-id">
				  <div class="form-group">
				    <label class="control-label col-sm-3" id="label-producto" for="">Producto:</label>
				    <div class="col-sm-9">
					    <select class="btn btn-default" id="item-id">
					    	<?php foreach($item as $i): ?>
					    		<option value="<?= $i['item_id']; ?>"><?= ucwords($i['item_name']); ?></option>
					    	<?php endforeach; ?>
					    </select>
				    </div>
				  </div>
				  <!--div class="form-group">
				    <label class="control-label col-sm-3" id="label-producto" for="">Proveedor:</label>
				    <div class="col-sm-9">
					    <select class="btn btn-default" id="proveedor-id">
					    	<?php foreach($prov as $p): ?>
					    		<option value="<?= $p['idproveedor']; ?>"><?= ucwords($p['razon_social']); ?></option>
					    	<?php endforeach; ?>
					    </select>
				    </div>
				  </div-->
				  <div class="form-group"> 
				    <div class="col-sm-offset-3 col-sm-9">
				      <button type="submit" id="submit-stock" value="add" class="btn btn-default">Guardar datos
				      <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
				      </button>
				    </div>
				  </div>
				</form>
				<!-- END FORM -->
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>