<?php
require_once('../database/Database.php');
require_once('../interface/iSales.php');
class Sales extends Database implements iSales {
	public function new_sales($code,$item_id,$generic,$cartQty,$price)
	{
		$sql = "INSERT INTO sales(item_code,item_id,generic_name,qty,price)
				VALUES(?,?,?,?,?);";
		return $this->insertRow($sql, [$code,$item_id,$generic,$cartQty,$price]);
	}//end new_sales

	public function daily_sales($date)
	{
		$sql = "SELECT * FROM sales LEFT join item on item.item_id = sales.item_id
				WHERE DATE(`date_sold`) = ?";
		return $this->getRows($sql, [$date]);
	}//end daily_sales
}//end class
$sales = new Sales();

/* End of file Sales.php */
/* Location: .//D/xampp/htdocs/regis/class/Sales.php */