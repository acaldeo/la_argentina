<?php
require_once('../database/Database.php');
require_once('../interface/iStockCarne.php');
class StockCarne extends Database implements iStockCarne {

	public function all_stockCarne()
	{
				
		$sql = "SELECT * FROM item, stock_carne,proveedores 
		where item.item_id=stock_carne.item_id 
		and proveedores.idproveedor = item.item_supplier_id ";	
		return $this->getRows($sql);
	}//end all_stockList
	public function all_stockCarneDetalle()
	{
				
		$sql = "SELECT * FROM item, stock_carne_detalle,proveedores 
		where item.item_id=stock_carne_detalle.item_id
		 and stock_carne_detalle.proveedor_id = proveedores.idproveedor";	
		return $this->getRows($sql);
	}//end all_stockList

	public function stockListByitem($dato)
	{
		$sql = "SELECT * FROM  stock  WHERE item_id = ?";
		return $this->getRow($sql, [$dato]);
	}//end stockListByitem*/
	
	public function get_stockList($stock_id)
	{
		$sql = "SELECT * FROM item, stock_carne,proveedores 
		where item.item_id=stock_carne.item_id 
		and stock_carne.proveedor_id = proveedores.idproveedor and stock_id = ?";
		return $this->getRow($sql, [$stock_id]);
	}//end get_stocklist
	public function stockListByCodigo($codigo)
	{
		$sql = "SELECT * FROM item INNER JOIN stock_carne 
		ON item.item_id=stock_carne.item_id 
		WHERE  item.item_code = ? ";
		return $this->getRow($sql, [$codigo]);
	}//end stockListByCodigo
	
	public function add_fuck_carne($item_id,$proveedor_id)
	{
		$sql = "INSERT INTO stock_carne(item_id, proveedor_id)
				VALUES(?,?)";
		// return true;
		return $this->insertRow($sql, [$item_id,$proveedor_id]);
	}//end add_stock
	public function add_fuck_compraCarne($stock_id,$prov,$qty,$precio,$item_id,$item_code)
	{
		$sql = "INSERT INTO stock_carne_detalle(stock_id,item_id,item_code, proveedor_id,stock_qty, costo)
				VALUES(?,?,?,?,?,?)";
		// return true;
		return $this->insertRow($sql, [$stock_id,$item_id,$item_code,$prov,$qty,$precio]);
	}//end add_stock_compraCarne

	public function update_fuck_compraCarne($stock_id, $total)
	{
		$sql = "UPDATE stock_carne
				SET costo = ?
				WHERE stock_id = ?";
		return $this->updateRow($sql, [$total, $stock_id]);
	}//end update_fuck_compraCarne

	
}//end class Stock
$stockCarne = new StockCarne();
/* End of file Stock.php */
/* Location: .//D/xampp/htdocs/regis/class/Stock.php */