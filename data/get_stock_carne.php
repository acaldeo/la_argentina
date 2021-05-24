<?php 
//require_once('../class/Cart.php');
require_once('../class/Stock-carne.php');
if(isset($_POST['codigo'])){
	$codigo = $_POST['codigo'];
	$stockDetails = $stockCarne->stockListByCodigo($codigo);
	
	if($stockDetails != 0){
		$return['stockid'] = $stockDetails['stock_id'];
		$return['stockcantidad'] = '1';
		$return['itemid'] = $stockDetails['item_id'];
		//$return['itemprice'] = $stockDetails['item_price'];
		//$return['itemiva'] = $stockDetails['item_iva'];
		$return['datos'] = $stockDetails;
		
	}
	echo json_encode($return);	

	
}//end isset

$stockCarne->Disconnect();