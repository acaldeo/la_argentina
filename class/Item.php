<?php
/*************************/
//Mostrar errores php
///*************************/
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
///*************************/
require_once('../database/Database.php');
require_once('../interface/iItem.php');
class Item extends Database implements iItem {
	public function all_items()
	{
		$sql = "SELECT i.item_id,i.item_name, i.purchase, i.item_price, i.item_iva,i.item_code/*,i.item_qty,i.item_stock_min, i.item_stock_max*/, p.razon_social as proveedor FROM item i LEFT JOIN proveedores p on i.item_supplier_id = p.idproveedor ORDER BY i.item_name ASC";
		return $this->getRows($sql);
	}//end all_items
	
	public function get_item($item_id)
	{
		$sql = "SELECT *
				FROM item
				WHERE item_id = ?";
		return $this->getRow($sql, [$item_id]);
	}//end get_item
		public function get_itemByCode($code)
	{
		$sql = "SELECT *
				FROM item
				WHERE item_code = ?";
		return $this->getRow($sql, [$code]);
	}//end edit_item
	public function add_item($iName, $iPurchase, $iPrice, $iIva, $icode,$iProv/*, $qty, $min, $max*/)
	{
		$sql = "INSERT INTO item(item_name,purchase, item_price,item_iva, item_code, item_supplier_id/*,item_qty, item_stock_min, item_stock_max*/)
				VALUES(?, ?, ?, ?, ?, ?/*, ?, ?, ?*/)";
		return $this->insertRow($sql, [$iName,$iPurchase, $iPrice, $iIva, $icode, $iProv/*, $qty, $min, $max*/]);
	}//end add_item

	public function edit_item($item_id, $iName, $iPurchase, $iPrice, $iIva, $icode,$iProv)
	{
		$sql = "UPDATE item 
				SET item_name = ?, purchase = ?,item_price = ?, item_iva = ?, item_code = ?, item_supplier_id = ?
				WHERE item_id = ?";
		return $this->updateRow($sql, [$iName, $iPurchase, $iPrice, $iIva, $icode,$iProv,$item_id]);
	}//end edit_item
	public function edit_item_precio($item_id, $iPrecio)
	{
		$sql = "UPDATE item 
				SET item_price = ?
				WHERE item_id = ?";
		return $this->updateRow($sql, [$iPrecio,$item_id]);
	}//end edit_item_precio
}//end class Item

$item = new Item();

/* End of file Item.php */
/* Location: .//D/xampp/htdocs/regis/class/Item.php */