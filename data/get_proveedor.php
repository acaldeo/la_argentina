<?php 
require_once('../class/Proveedor.php');
if(isset($_POST['proveedor_id'])){
	$proveedor_id = $_POST['proveedor_id'];
	$proveedorDetails = $proveedor->get_proveedor($proveedor_id);
	$return['title'] = "Edit Proveedor";
	$return['event'] = "edit";
	if($proveedorDetails > 0){			
		$return['id'] = $proveedorDetails['idproveedor'];
		$return['name'] = $proveedorDetails['razon_social'];
		$return['domicilio'] = $proveedorDetails['domicilio'];
		$return['localidad'] = $proveedorDetails['localidad'];
		$return['provincia'] = $proveedorDetails['provincia'];
		$return['telefono'] = $proveedorDetails['telefono'];
		$return['email'] = $proveedorDetails['email'];
		$return['estado'] = $proveedorDetails['estado'];
		$return['categoria_iva'] = $proveedorDetails['categoria_iva'];
		$return['cuit'] = $proveedorDetails['cuit'];
		$return['cbu'] = $proveedorDetails['cbu'];
		
	}
	
	echo json_encode($return);	

	
}//end isset

$proveedor->Disconnect();