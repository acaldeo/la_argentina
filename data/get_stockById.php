<?php 
require_once('../class/Stock.php');
if(isset($_POST['stock_id'])){
	$stock_id = $_POST['stock_id'];
	$stockDetails = $stock->get_stockList($stock_id);
	$return['title'] = "Edit stock";
	$return['event'] = "edit";
	if($stockDetails > 0){			
		$return['stock_id'] = $stockDetails['stock_id'];
		$return['item_id'] = $stockDetails['item_id'];
		$return['item_code'] = $stockDetails['item_code'];
		$return['item_name'] = $stockDetails['item_name'];
		$return['razon_social'] = $stockDetails['razon_social'];
		$return['stock_qty'] = $stockDetails['stock_qty'];
		$return['stock_min'] = $stockDetails['stock_min'];
		$return['stock_max'] = $stockDetails['stock_max'];
		
	}
	
	echo json_encode($return);	

	
}//end isset

$stock->Disconnect();