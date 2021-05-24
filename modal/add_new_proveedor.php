<?php 
require_once('database/Database.php');
$db = new Database();
$sql = "SELECT *
		FROM proveedores
		ORDER BY idproveedor ASC";
$types = $db->getRows($sql);
// echo '<pre>';
// 	print_r($types);
// echo '</pre>';
 ?>
<div class="modal fade" id="modal-proveedor">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
			
				<form class="form-horizontal" role="form" id="form-proveedor">
				<input type="hidden" id="proveedor-id">
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Nombre:</label>
				    <div class="col-sm-9">
				      <input type="text" maxlength="50" class="form-control" id="proveedor-name" placeholder="Ingresa el nombre" required="" autofocus="">
				    </div>
				  </div>
				    <div class="form-group">
				    <label class="control-label col-sm-3" for="">Dirección:</label>
				    <div class="col-sm-9">
				      <input type="text" maxlength="50" class="form-control" id="proveedor-direccion" placeholder="Ingresa la direccion" required="" autofocus="">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Localidad:</label>
				    <div class="col-sm-9">
				      <input type="text" maxlength="50" class="form-control" id="proveedor-localidad" placeholder="Ingresa localidad" required="" autofocus="">
				    </div>
				  </div>
				  <div class="form-group">
				  <label class="control-label col-sm-3" for="">Provincia:</label>
				    <div class="col-sm-9">
				      <input type="text" maxlength="50" class="form-control" id="proveedor-provincia" placeholder="Ingresa provincia" required="" autofocus="">
				    </div>
				  </div>
				  <div class="form-group">
				   <label class="control-label col-sm-3" for="">Telefono:</label>
				    <div class="col-sm-9">
				      <input type="text" maxlength="50" class="form-control" id="proveedor-telefono" placeholder="Ingresa el telefono" required="" autofocus="">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Mail:</label>
				    <div class="col-sm-9">
				      <input type="text" maxlength="50" class="form-control" id="proveedor-email" placeholder="Ingresa el mail" required="" autofocus="">
				    </div>
				  </div>
				  <div class="form-group">
				   <label class="control-label col-sm-3" for="">Cuit:</label>
				    <div class="col-sm-9">
				      <input type="text" maxlength="50" class="form-control" id="proveedor-cuit" placeholder="Ingresa el cuit" required="" autofocus="">
				    </div>
				  </div>
				   <div class="form-group">
				   <label class="control-label col-sm-3" for="">CBU:</label>
				    <div class="col-sm-9">
				      <input type="text" maxlength="50" class="form-control" id="proveedor-cbu" placeholder="Ingresa el cbu" required="" autofocus="">
				    </div>
				  </div>
				  <div class="form-group"> 
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" id="submit-proveedor" value="add" class="btn btn-default">Guardar datos
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