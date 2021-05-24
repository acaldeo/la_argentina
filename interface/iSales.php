<?php 
interface iSales{
	public function new_sales($code,$item_id,$generic,$cartQty,$price);
	public function daily_sales($date);
}