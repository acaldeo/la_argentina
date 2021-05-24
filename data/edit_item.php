<?php 
require_once('../class/Item.php');
if(isset($_POST['item_id'])){
	$item_id = $_POST['item_id'];
	$iName = $_POST['iName'];
	$iPurchase = $_POST['iPurchase'];
	$iPrice = $_POST['iPrice'];
	$iIva = $_POST['iIva'];
	$icode = $_POST['icode'];
	$iProv = $_POST['iProv'];
	$saveEdit = $item->edit_item($item_id, $iName, $iPurchase, $iPrice, $iIva, $icode,$iProv);
	$return['valid'] = false;
	if($saveEdit){
		$return['valid'] = true;
		$return['msg'] = "Editado correctamente!";
	}
	echo json_encode($return);
}//end isset
$item->Disconnect();
