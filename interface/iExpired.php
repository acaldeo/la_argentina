<?php 
interface iExpired{
	public function add_expired($name, $price, $qty, $stock_min);
	public function all_expired();
}//end 