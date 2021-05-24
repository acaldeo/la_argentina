<?php
require_once('../database/Database.php');
require_once('../interface/iExpired.php');
class Expired extends Database implements iExpired {

	public function add_expired($name, $price, $qty, $stock_min)
	{
		$sql = "INSERT INTO expired(exp_itemName, exp_itemPrice, exp_itemQty, exp_itemMin)
				VALUES(?,?,?,?);";
		return $this->insertRow($sql, [$name, $price, $qty, $stock_min]);
	}//end add_expired

	public function all_expired()
	{
		$sql = "SELECT *
				FROM stock left join item on item.item_id = stock.item_id INNER JOIN proveedores on proveedores.idproveedor = item.item_supplier_id where stock_qty < stock_min ";
		return $this->getRows($sql);
	}//end all_expired
}//end class

$expired = new Expired();

/* End of file Expired.php */
/* Location: .//D/xampp/htdocs/regis/class/Expired.php */