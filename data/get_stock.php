<?php 
//require_once('../class/Cart.php');
require_once('../class/Stock.php');
if(isset($_POST['codigo'])){
	$codigo = $_POST['codigo'];
	$stockDetails = $stock->stockListByCodigo($codigo);
	$return['title'] = "Edit stock";
	$return['event'] = "edit";
	if($stockDetails != 0){
		$return['stockid'] = $stockDetails['stock_id'];
		$return['stockcantidad'] = $stockDetails['stock_qty'];
		$return['itemid'] = $stockDetails['item_id'];
		$return['itemprice'] = $stockDetails['item_price'];
		$return['itemiva'] = $stockDetails['item_iva'];
		$return['datos'] = $stockDetails;
		
	}
	echo json_encode($return);	

	
}//end isset

$stock->Disconnect();