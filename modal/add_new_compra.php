<?php 
require_once('database/Database.php');
$db = new Database();
$sqlP = "SELECT *
		FROM proveedores
		ORDER BY idproveedor ASC";
$prov = $db->getRows($sqlP);
$sqlI = "SELECT *
		FROM stock inner join item on item.item_id = stock.item_id
		ORDER BY item_name ASC";
$items = $db->getRows($sqlI);
// echo '<pre>';
// 	print_r($types);
// echo '</pre>';
 ?>
<div class="modal fade" id="modal-compra">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
			
				<form class="form-horizontal" role="form" id="form-compra">
				<input type="hidden" id="proveedor-id">
				<div class="form-group">
				    <label class="control-label col-sm-3" for="">Proveedor:</label>
				    <div class="col-sm-9"> 
				      <select id="venta-prov" class="btn btn-default">
				      	<?php foreach($prov as $p): ?>
				      		<option value="<?= $p['idproveedor']; ?>"><?= ucwords($p['razon_social']); ?></option>
				      	<?php endforeach; ?>
				      </select>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Producto:</label>
				    <div class="col-sm-9"> 
				      <select id="venta-item" class="btn btn-default">
				      	<?php foreach($items as $i): ?>
				      		<option value="<?= $i['stock_id']; ?>"><?= ucwords($i['item_name']); ?></option>
				      	<?php endforeach; ?>
				      </select>
				    </div>
				  </div>
				 <div class="form-group">
				    <label class="control-label col-sm-3" for="">Cantidad:</label>
				    <div class="col-sm-9"> 
				      <input type="number" min="1" class="form-control" id="qty" placeholder="Ingresa la cantidad" required="">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Comprado:</label>
				    <div class="col-sm-9"> 
				      <input type="date" class="form-control" id="purc" required="">
				    </div>
				  </div>
				  <div class="form-group"> 
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" id="submit-compra" value="add" class="btn btn-default">Guardar datos
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