<?php 
/*************************/
//Mostrar errores php
///*************************/
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
///*************************/
require_once('../class/Item.php');

if(isset($_POST['iName']) && isset($_POST['iPrice'])){
	$iName = $_POST['iName'];
	$iPurchase = $_POST['iPurchase'];
	$iPrice = $_POST['iPrice'];
	$iIva = $_POST['iIva'];
	$icode = $_POST['icode'];
	$iProv = $_POST['iProv'];
	/*$qty = $_POST['qty'];
	$min = $_POST['min'];
	$max = $_POST['max'];*/
	
	$iName = strtolower($iName);
	$iPurchase = strtolower($iPurchase);
	$iPrice = strtolower($iPrice);
	$iName = ucwords(strtolower($iName));
	$icode = ucwords(strtolower($icode));
	$itemDetails = $item->get_itemByCode($icode);
	if ($itemDetails != 0) {
		$return['valid'] = true;
		$return['msg'] = "El item ya existe!";
	}else{
		$saveItem = $item->add_item($iName, $iPurchase, $iPrice, $iIva, $icode,$iProv/*, $qty, $min, $max*/);
		if($saveItem){
			$return['valid'] = true;
			$return['msg'] = "Nuevo registro agregado con éxito!";
		}else{
			$return['valid'] = false;
		}
	}	
	echo json_encode($return);
}//end isset

$item->Disconnect();