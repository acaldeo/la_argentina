<?php 
require_once('../class/Stock.php');
if(isset($_POST['stock_id'])){
	$Sproducto =$_POST['Sproducto']; 
	$stock_id = $_POST['stock_id'];
	$Scantidad = $_POST['Scantidad'];
	$Sminimo = $_POST['Sminimo'];
	$Smaximo = $_POST['Smaximo'];
	$Scomprado = $_POST['Scomprado'];
	
	$saveEdit = $stock->edit_stock($Sproducto,$stock_id, $Scantidad, $Sminimo, $Smaximo, $Scomprado);
	$return['valid'] = false;
	if($saveEdit){
		$return['valid'] = true;
		$return['msg'] = "Editado correctamente!";
	}
	echo json_encode($return);
}//end isset
$stock->Disconnect();