<?php 
/*************************/
//Mostrar errores php
///*************************/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
///*************************/
require_once('../class/Compra.php');
require_once('../class/Stock.php');
if(isset($_POST['Vcantidad'])){
	$Vproveedor = $_POST['Vproveedor'];
	$Vproducto = $_POST['Vproducto'];
	$Vcantidad = $_POST['Vcantidad'];
	$Vcompra = $_POST['Vcompra'];
	$Stock = $stock->get_stockList($Vproducto);
	$item = $Stock['item_id'];
	$qtyStock = $Stock['stock_qty'];
	$cantidad = $qtyStock + $Vcantidad;

	$saveCompra = $compra->add_compra($Vproveedor, $item, $Vcantidad, $Vcompra);
	if($saveCompra){
		$updateStock = $stock->update_stockQty($Vproducto, $cantidad);
		$return['cantidad']=$cantidad;
		//$return["cantidad"]=$cantidad; 
		$return['valid'] = true;
		$return['msg'] = "Nuevo registro agregado con éxito!";
	}else{
		$return['valid'] = false;
	}
	echo json_encode($return);
}//end isset

$compra->Disconnect();