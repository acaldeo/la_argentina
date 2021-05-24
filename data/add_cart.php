<?php 
require_once('../class/Cart.php');
require_once('../class/Stock.php');
if(isset($_POST['stock_id'])){
	$stock_id = $_POST['stock_id'];
	$item_id = $_POST['item_id'];
	$cqty = $_POST['cqty'];//cart qty ni siya
	$precio = $_POST['precio'];
	$subtotal = $cqty * $precio;
	$user_id = $_SESSION['logged_id'];
	$nqty = $_POST['nqty'];//cart qty ni siya
	$uniqid = $_SESSION['uniqid'];
	$itemExist = $cart->getCartByItemId($item_id);
	

	if ($itemExist != null) {
		//si producto ya existe en carrito, actualiza cantidad
		$qty= $itemExist['cart_qty'];
        $precio = $itemExist['cart_precio'];
		$subtotal = $precio + $subtotal;   
		$cqty = $qty + $cqty ; 

		$updateToCart = $cart->update_cartQty($cqty,$subtotal,$item_id); 
		$updateStockQty = $stock->update_stockQty($stock_id, $nqty);
		//$return['cantidad']=$itemExist['cart_qty'];
		//$return['datos'] = $itemExist;

	
	}else{
		//add to cart
		$saveToCart = $cart->add_toCart($item_id, $cqty,$subtotal, $stock_id, $user_id, $uniqid);
		$updateStockQty = $stock->update_stockQty($stock_id, $nqty);
		$return['false']=false;
	}	
	echo json_encode($return);	
	//update stock og minus si sa cart qty
	

}//end isset
$cart->Disconnect();
?>