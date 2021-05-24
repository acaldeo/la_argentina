<?php 
require_once('../class/Stock-carne.php');
require_once('../class/Item.php');
if(isset($_POST['item_id'])){
	$item_id = $_POST['item_id'];
	$itemDetails = $item->get_item($item_id);
	if($itemDetails > 0){
		$proveedor_id = $itemDetails['item_supplier_id'];
		$saveStock = $stockCarne->add_fuck_carne($item_id,$proveedor_id);
	}
	//$proveedor_id = $_POST['proveedor_id'];	

	
}//end isset
