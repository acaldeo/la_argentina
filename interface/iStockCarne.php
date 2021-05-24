<?php 
interface iStockCarne {
	public function all_stockCarne();
	public function stockListByCodigo($codigo);
	public function add_fuck_carne($item_id,$proveedor_id);
	public function add_fuck_compraCarne($stock_id,$prov,$qty,$precio,$item_id,$item_code);
	public function update_fuck_compraCarne($stock_id, $total);
	public function all_stockCarneDetalle();
	public function get_stockList($stock_id);
	public function stockListByitem($dato);
	
}//end iStock