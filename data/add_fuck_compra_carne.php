<?php 
require_once('../class/Stock-carne.php');
if(isset($_POST['stock_id'])){
	$stock_id = $_POST['stock_id'];
	$prov = $_POST['prov'];
	$qty = $_POST['qty'];
	$item_id = $_POST['item_id'];
	$item_code = $_POST['item_code'];
	$precio = $_POST['precio'];
	
	$saveStock = $stockCarne->add_fuck_compraCarne($stock_id,$prov,$qty,$precio,$item_id,$item_code);
	
	if($saveStock){
		$deuda = $stockCarne->get_stockList($stock_id);
		if($deuda > 0){
			$total = $deuda['costo'] + $precio; 
			$updateStock = $stockCarne->update_fuck_compraCarne($stock_id,$total);
		}
	}
}//end isset
$stockCarne->Disconnect();