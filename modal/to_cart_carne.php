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
?>
<div class="modal fade" id="modal-to-cart-carne">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Venta de carne</h4>
			</div>
			<div class="modal-body">
			<!--  -->
				<form class="form-horizontal" role="form" id="form-toCart-carne">
					<div class="form-group">
				    <label class="control-label col-sm-3" id="label-producto" for="">Producto:</label>
						<div class="col-sm-9">
							<select class="btn btn-default" id="cart-item-id">
								<?php foreach($item as $i): ?>
									<option value="<?= $i['item_code']; ?>"><?= ucwords($i['item_name']); ?></option>
								<?php endforeach; ?>
							</select>
						</div>
				  	</div>		
				  	<div class="form-group">
						<label class="control-label col-sm-2" for="">Costo:</label>
						<div class="col-sm-10">
						<input type="number" min="1" class="form-control" id="cart-precio" placeholder="Ingresa la cantidad" required="">
						</div>
				  	</div>
				    <div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-success">Agregar
						<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
						</button>
						</div>
				    </div>
				</form>
			<!--  -->
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
