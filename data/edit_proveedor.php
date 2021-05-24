<?php 
require_once('../class/Proveedor.php');
if(isset($_POST['proveedor_id'])){
	$proveedor_id = $_POST['proveedor_id'];
	$Pname = $_POST['Pname'];
	$Pdireccion = $_POST['Pdireccion'];
	$Plocalidad = $_POST['Plocalidad'];
	$Pprovincia = $_POST['Pprovincia'];
	$Ptelefono = $_POST['Ptelefono'];
	$Pmail = $_POST['Pmail'];
	$Pcuit = $_POST['Pcuit'];
	$Pcbu = $_POST['Pcbu'];
	$saveEdit = $proveedor->edit_proveedor($Pname, $Pdireccion, $Plocalidad, $Pprovincia, $Ptelefono,$Pmail, $Pcuit,$Pcbu, $proveedor_id);
	$return['valid'] = false;
	if($saveEdit){
		$return['valid'] = true;
		$return['msg'] = "Editado correctamente!";
	}
	echo json_encode($return);
}//end isset
$proveedor->Disconnect();