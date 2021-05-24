<?php
require_once('../database/Database.php');
require_once('../interface/iStock.php');
class Stock extends Database implements iStock {

	public function all_stockList()
	{
				
		$sql = "SELECT * FROM item, stock, proveedores where proveedores.idproveedor=item.item_supplier_id and item.item_id=stock.item_id and stock.stock_qty!=?";	
		return $this->getRows($sql, [0]);
	}//end all_stockList
	public function stockListByCodigo($codigo)
	{
		$sql = "SELECT * FROM item INNER JOIN stock ON item.item_id=stock.item_id WHERE stock.stock_qty!=0 and item.item_code = ? ";
		return $this->getRow($sql, [$codigo]);
	}//end stockListByCodigo
	public function stockListByitem($dato)
	{
		$sql = "SELECT * FROM  stock  WHERE item_id = ?";
		return $this->getRow($sql, [$dato]);
	}//end stockListByitem
	
	public function get_stockList($stock_id)
	{
		$sql = "SELECT *
				FROM stock s 
				INNER JOIN item i 
				ON s.item_id = i.item_id
				WHERE s.stock_id = ?";
		return $this->getRow($sql, [$stock_id]);
	}//end get_stocklist

	public function del_stockList($stock_id)
	{
		$sql = "DELETE FROM stock 
				WHERE stock_id = ?";
		return $this->deleteRow($sql, [$stock_id]);
	}//end del_stockList

	public function add_stock($item_id, $qty, $xDate, $manu, $purc)
	{
		$sql = "INSERT INTO stock(item_id, stock_qty, stock_expiry, stock_manufactured, stock_purchased)
				VALUES(?,?,?,?,?)";
		// return true;
		return $this->insertRow($sql, [$item_id, $qty, $xDate, $manu, $purc]);
	}//end add_stock

	public function all_stockGroup()
	{
		$sql = "SELECT s.stock_id,i.item_id,i.item_name, i.item_price,SUM(stock_qty) as qty
				FROM stock s 
				INNER JOIN item i
				ON s.item_id = i.item_id
				GROUP BY s.item_id
				ORDER BY i.item_name ASC";
		return $this->getRows($sql);
	}//end all_stockGroup

	public function update_stockQty($stock_id, $stock_qty)
	{
		$sql = "UPDATE stock
				SET stock_qty = ?
				WHERE stock_id = ?";
		return $this->updateRow($sql, [$stock_qty, $stock_id]);
	}//end update_stockQty

	public function get_stockQty($stock_id)
	{
		$sql = "SELECT *
				FROM stock 
				WHERE stock_id = ?";
		return $this->getRow($sql, [$stock_id]);
	}//end get_stockQty
	
	public function add_fuck($item_id, $qty, $min, $max, $purc)
	{
		$sql = "INSERT INTO stock(item_id, stock_qty, stock_min, stock_max, stock_purchased)
				VALUES(?,?,?,?,?)";
		return $this->insertRow($sql, [$item_id, $qty, $min, $max, $purc]);
	}//end add_stock
	public function edit_stock($Sproducto,$stock_id, $Scantidad, $Sminimo, $Smaximo,$Scomprado)
	{	
		$sql = "UPDATE stock 
				SET item_id = ?, stock_qty = ?, stock_min = ?,stock_max = ?,stock_purchased = ?
				WHERE stock_id = ?";
		return $this->updateRow($sql, [$Sproducto, $Scantidad,$Sminimo,$Smaximo,$Scomprado,$stock_id]);
	}//end edit_item
}//end class Stock
$stock = new Stock();
/* End of file Stock.php */
/* Location: .//D/xampp/htdocs/regis/class/Stock.php */