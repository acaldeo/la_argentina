<?php 
/*************************/
//Mostrar errores php
///*************************/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
///*************************/
require_once('../class/Proveedor.php');

if(isset($_POST['Pname']) && isset($_POST['Pcuit'])){
	$Pname = $_POST['Pname'];
	$Pdireccion = $_POST['Pdireccion'];
	$Plocalidad = $_POST['Plocalidad'];
	$Pprovincia = $_POST['Pprovincia'];
	$Ptelefono = $_POST['Ptelefono'];
	$Pmail = $_POST['Pmail'];
	$Pcuit = $_POST['Pcuit'];
	$Pcbu = $_POST['Pcbu'];
	
	$Pname = strtolower($Pname);
	$Pdireccion = strtolower($Pdireccion);
	$Plocalidad = strtolower($Plocalidad);
	$Pprovincia = strtolower($Pprovincia);
	$Pmail = ucwords(strtolower($Pmail));
	$cuitExist = $proveedor->get_proveedorByCuit($Pcuit);
	if ($cuitExist != 0) {
		$return['valid'] = true;
		$return['msg'] = "Ya existe el proveedor!";
	}else{
		$saveProveedor = $proveedor->add_proveedor($Pname, $Pdireccion, $Plocalidad, $Pprovincia, $Ptelefono,$Pmail, $Pcuit,$Pcbu);
		if($saveProveedor){
			$return['valid'] = true;
			$return['msg'] = "Nuevo registro agregado con éxito!";
		}else{
			$return['valid'] = false;
		}
	}	
	echo json_encode($return);
}//end isset

$proveedor->Disconnect();