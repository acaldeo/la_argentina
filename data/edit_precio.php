<?php 
require_once('../class/Item.php');
if(isset($_POST['item_id'])){
	$item_id = $_POST['item_id'];
	$iPrecio = $_POST['iPrecio'];
	$saveEdit = $item->edit_item_precio($item_id, $iPrecio);
	$return['valid'] = false;
	if($saveEdit){
		$return['valid'] = true;
		$return['msg'] = "Editado correctamente!";
	}
	echo json_encode($return);
}//end isset
$item->Disconnect();