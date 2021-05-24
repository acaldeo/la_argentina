<?php 
require_once('../class/Item.php');
if(isset($_POST['item_id'])){
	$item_id = $_POST['item_id'];
	$itemDetails = $item->get_item($item_id);
	$return['title'] = "Edit Item";
	$return['event'] = "edit";
	if($itemDetails > 0){
		$return['id'] = $itemDetails['item_id'];
		$return['name'] = $itemDetails['item_name'];
		$return['purchase'] = $itemDetails['purchase'];
		$return['price'] = $itemDetails['item_price'];
		$return['iva'] = $itemDetails['item_iva'];	
		$return['id'] = $itemDetails['item_id'];
		$return['code'] = $itemDetails['item_code'];
		$return['supplier'] = $itemDetails['item_supplier_id'];
		
	}
	echo json_encode($return);	
	
}//end isset

$item->Disconnect();