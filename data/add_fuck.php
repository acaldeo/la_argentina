<?php 
require_once('../class/Stock.php');
if(isset($_POST['purc'])){
	$item_id = $_POST['item_id'];
	$qty = $_POST['qty'];
	$min = $_POST['min'];
	$max = $_POST['max'];	
	$purc = $_POST['purc'];

	$saveStock = $stock->add_fuck($item_id, $qty, $min, $max, $purc);
}//end isset
