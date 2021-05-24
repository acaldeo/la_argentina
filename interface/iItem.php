<?php 
interface iItem{
	public function all_items();
	public function get_item($item_id);
	public function get_itemByCode($code);
	public function add_item($iName, $iPurchase, $iPrice, $iIva, $icode,$iProv);
	public function edit_item($item_id, $iName, $iPurchase, $iPrice, $iIva, $icode,$iProv);
	public function edit_item_precio($item_id, $iPrecio);
}//end iItem