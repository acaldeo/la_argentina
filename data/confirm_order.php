<?php 
require_once('../class/Cart.php');
require_once('../class/Sales.php');
if(isset($_POST['click'])){
	if($_POST['click'] == 'yes'){
		//select cart details
		$cartDetails = $cart->allCart();

		foreach ($cartDetails as $cd) {
			$code = $cd['item_code'];
			$item_id = $cd['item_id'];
			$generic = $cd['item_name'];
			$cartQty = $cd['cart_qty'];
			$price = $cd['item_price'];
			$return['item'] = $item_id;
			$insertSale = $sales->new_sales($code,$item_id,$generic,$cartQty,$price);
			//insert to sales
		}//end foreach

		//del all cart
		
		$delAllCart = $cart->dellAllCart();
		$return['valid'] = false;
		if($delAllCart){
			$return['valid'] = true;
			$return['msg'] = 'La transacción se agregó correctamente!';
		}
		echo json_encode($return);
	}//end yes
}//end isset