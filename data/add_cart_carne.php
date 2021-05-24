<?php 
/*************************/
//Mostrar errores php
///*************************/
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
///*************************/

require_once('../class/Cart.php');
//require_once('../class/Stock.php');
if(isset($_POST['stock_id'])){
	$stock_id = $_POST['stock_id'];
	$item_id = $_POST['item_id'];
	$qty = $_POST['qty'];//cart qty ni siya
	$subtotal = $_POST['precio'];
	$user_id = $_SESSION['logged_id'];
	$uniqid = $_SESSION['uniqid'];
	//$itemExist = $cart->getCartByItemId($item_id);
	

	/*if ($itemExist != null) {
		//si producto ya existe en carrito, actualiza cantidad
		$cqty= $itemExist['cart_qty'];
        $precio = $itemExist['cart_precio'];
		$subtotal = $precio + $subtotal;   
		$qty = $qty + $cqty ; 

		$updateToCart = $cart->update_cartQty($qty,$subtotal,$item_id); 
		//$updateStockQty = $stock->update_stockQty($stock_id, $nqty);
		//$return['cantidad']=$itemExist['cart_qty'];
		$return['datos'] = $itemExist;
		$return['itemid']=$itemExist['item_id'];
		
		
	
	}else{*/
		//add to cart
		$saveToCart = $cart->add_toCart($item_id, $qty,$subtotal, $stock_id, $user_id, $uniqid);
		//$updateStockQty = $stock->update_stockQty($stock_id, $nqty);
		$return['false']=false;
		$return['itemid']=$qty;
	//}	
	echo json_encode($return);	
	 
	//update stock og minus si sa cart qty
	

}//end isset
$cart->Disconnect();
?>